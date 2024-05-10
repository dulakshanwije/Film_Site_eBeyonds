function removeMovieCard(ele) {
  const card = ele.parentElement.parentElement;
  card.style.display = "none";
}

function toggleSideMenu() {
  const menu = document.getElementById("sidemenu");
  menu.classList.toggle("sidemenu--open");
}
