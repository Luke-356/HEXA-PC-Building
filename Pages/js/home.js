//-------------------Video Player-------------------//
const videoOnclick = document.querySelector(".video");

//when clicked play button
videoOnclick.addEventListener("click", () => {
  document.getElementById("video").play();
  document.getElementsByClassName("play-icon")[0].style.display = "none";
  document.getElementsByClassName("layer")[0].style.backgroundColor =
    "transparent";
});

//when video is ended
document.getElementById("video").addEventListener("ended", videoHandle, false);
function videoHandle() {
  document.getElementsByClassName("play-icon")[0].style.display = "block";
  document.getElementsByClassName("layer")[0].style.backgroundColor =
    "rgba(31, 31, 31, 0.5)";
}
//---------------------------------------------------//
