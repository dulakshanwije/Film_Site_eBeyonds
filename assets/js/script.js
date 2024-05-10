function removeMovieCard(ele) {
  const card = ele.parentElement.parentElement;
  const container = document.getElementById("movies-card-holder");
  container.removeChild(card);
}

function toggleSideMenu() {
  const menu = document.getElementById("sidemenu");
  menu.classList.toggle("sidemenu--open");
}

function resultWidthSetter() {
  const rel = document.getElementsByClassName("movies-card-holder");
  const width = window.getComputedStyle(rel[0]).width;
  const box = document.getElementsByClassName("movies-result-box");
  box[0].style.width = width;
}
window.onload = resultWidthSetter;
window.onresize = resultWidthSetter;

// HTTP GET Request to fetch TV Shows
function onSearch(query) {
  const container = document.getElementById("movies-result-box");
  const xhr = new XMLHttpRequest();
  xhr.open("GET", `https://api.tvmaze.com/search/shows?q=${query}`, true);
  xhr.getResponseHeader("Content-type", "application/json");

  container.replaceChildren();
  container.style.display = "flex";

  xhr.onload = function () {
    const obj = JSON.parse(this.responseText);
    obj.map((ele, index) => {
      const result_p = document.createElement("p");
      result_p.setAttribute("onclick", `addMovieCard('${ele.show.id}')`);
      result_p.setAttribute("class", "result-item");
      const name = ele.show.name;
      const language = ele.show.language;
      const genres = ele.show.genres.toString();
      const content_str = `${name} - ${language} - ${genres}`;
      const content = document.createTextNode(content_str);
      result_p.appendChild(content);
      container.appendChild(result_p);
      return null;
    });
  };

  xhr.send();
}

function removeTags(str) {
  if (str === null || str === "") return false;
  else str = str.toString();
  return str.replace(/(<([^>]+)>)/gi, "");
}

function addMovieCard(id) {
  const result_box = document.getElementById("movies-result-box");
  const container = document.getElementById("movies-card-holder");
  const xhr = new XMLHttpRequest();
  xhr.open("GET", `https://api.tvmaze.com/shows/${id}`, true);
  xhr.getResponseHeader("Content-type", "application/json");
  xhr.onload = function () {
    const obj = JSON.parse(this.responseText);
    const movie_card = document.createElement("div");
    movie_card.setAttribute("data-aos", "fade-up");
    movie_card.setAttribute("data-aos-duration", "2000");
    movie_card.setAttribute("class", "movies-card");

    const movies_image_holder = document.createElement("div");
    movies_image_holder.setAttribute("class", "movies-image-holder");

    const movie_image = document.createElement("img");
    if (!obj.image) {
      movie_image.setAttribute("src", "./assets/images/movies/0.png");
    } else {
      movie_image.setAttribute("src", obj.image.original);
    }
    movie_image.setAttribute("alt", "Movie Banner");

    const movie_close_btn = document.createElement("div");
    movie_close_btn.setAttribute("class", "movies-close-btn");
    movie_close_btn.setAttribute("onclick", "removeMovieCard(this)");

    const close_icon = document.createElement("img");
    close_icon.setAttribute("src", "./assets/images/icons/close.svg");
    close_icon.setAttribute("alt", "Close Icon");

    movie_close_btn.appendChild(close_icon);
    movies_image_holder.appendChild(movie_image);
    movies_image_holder.appendChild(movie_close_btn);
    movie_card.appendChild(movies_image_holder);

    const movies_info = document.createElement("div");
    movies_info.setAttribute("class", "movies-info");

    const movies_title = document.createElement("h6");
    movies_title.setAttribute("class", "movies-title");
    const title = document.createTextNode(obj.name);
    movies_title.appendChild(title);

    const movies_desc = document.createElement("p");
    movies_desc.setAttribute("class", "movies-desc");
    let desc = null;
    if (obj.summary === null) {
      desc = document.createTextNode("No Description Found!");
    } else {
      desc = document.createTextNode(removeTags(obj.summary));
    }
    movies_desc.appendChild(desc);

    movies_info.appendChild(movies_title);
    movies_info.appendChild(movies_desc);
    movie_card.appendChild(movies_info);

    container.insertBefore(movie_card, container.firstChild);
    result_box.style.display = "none";
  };

  xhr.send();
}

// const node = document.createElement("li");
// const textnode = document.createTextNode("Water");
// node.appendChild(textnode);
// document.getElementById("myList").appendChild(node);
