function changeColorRatingBar(){
  let activeText = document.querySelector('.wpforo-active')
  activeText.classList.add('.remove:hover')

  let ratings = document.querySelectorAll('.rating-bar-cell')
  ratings.forEach(element => {
    if(!element.classList.contains("wpfbg-7")){
      element.style.backgroundColor = "#7CC985"
    } else {
      element.style.backgroundColor = "#7CC985"
    }
  });
}

export default changeColorRatingBar