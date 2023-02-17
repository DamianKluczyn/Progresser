const form = document.querySelector("form");
const difficultyOne = form.querySelector('.difficulty-one');
const difficultyTwo = form.querySelector('.difficulty-two');
const difficultyThree = form.querySelector('.difficulty-three');
const difficultyFour = form.querySelector('.difficulty-four');
const priorityLow = form.querySelector('.priority-low');
const priorityMid = form.querySelector('.priority-mid');
const priorityAsap = form.querySelector('.priority-ASAP');


function difficultyOneClick() {
    difficultyOne.style.background = "black";
    difficultyTwo.style.background = "white";
    difficultyThree.style.background = "white";
    difficultyFour.style.background = "white";
    document.cookie="difficulty=1";
}

function difficultyTwoClick() {
    difficultyOne.style.background = "black";
    difficultyTwo.style.background = "black";
    difficultyThree.style.background = "white";
    difficultyFour.style.background = "white";
    document.cookie="difficulty=2";
}

function difficultyThreeClick() {
    difficultyOne.style.background = "black";
    difficultyTwo.style.background = "black";
    difficultyThree.style.background = "black";
    difficultyFour.style.background = "white";
    document.cookie="difficulty=3";
}

function difficultyFourClick() {
    difficultyOne.style.background = "black";
    difficultyTwo.style.background = "black";
    difficultyThree.style.background = "black";
    difficultyFour.style.background = "black";
    document.cookie="difficulty=4";
}


difficultyOne.addEventListener("click", difficultyOneClick);
difficultyTwo.addEventListener("click", difficultyTwoClick);
difficultyThree.addEventListener("click", difficultyThreeClick);
difficultyFour.addEventListener("click", difficultyFourClick);


function priorityLowClick(){
    document.cookie="priority=1";
}
function priorityMidClick(){
    document.cookie="priority=2";
}
function priorityAsapClick(){
    document.cookie="priority=3";
}

priorityLow.addEventListener("click", priorityLowClick);
priorityMid.addEventListener("click", priorityMidClick);
priorityAsap.addEventListener("click", priorityAsapClick);
