const form = document.querySelector("form");
const difficultyOne = form.querySelector('.difficulty-one');
const difficultyTwo = form.querySelector('.difficulty-two');
const difficultyThree = form.querySelector('.difficulty-three');
const difficultyFour = form.querySelector('.difficulty-four');

function difficultyOneClick() {
    difficultyOne.style.background = "black";
    difficultyTwo.style.background = "white";
    difficultyThree.style.background = "white";
    difficultyFour.style.background = "white";
}

function difficultyTwoClick() {
    difficultyOne.style.background = "black";
    difficultyTwo.style.background = "black";
    difficultyThree.style.background = "white";
    difficultyFour.style.background = "white";
}

function difficultyThreeClick() {
    difficultyOne.style.background = "black";
    difficultyTwo.style.background = "black";
    difficultyThree.style.background = "black";
    difficultyFour.style.background = "white";
}

function difficultyFourClick() {
    difficultyOne.style.background = "black";
    difficultyTwo.style.background = "black";
    difficultyThree.style.background = "black";
    difficultyFour.style.background = "black";
}


difficultyOne.addEventListener("click", difficultyOneClick);
difficultyTwo.addEventListener("click", difficultyTwoClick);
difficultyThree.addEventListener("click", difficultyThreeClick);
difficultyFour.addEventListener("click", difficultyFourClick);

/*
$('div').click(function() {
    var text = $(this).text();
    // do something with the text
});*/
