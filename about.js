const slider = document.getElementById('slider');
const sliderValue = document.getElementById('sliderValue');

slider.addEventListener('input', function () {
    sliderValue.textContent = slider.value;
});
