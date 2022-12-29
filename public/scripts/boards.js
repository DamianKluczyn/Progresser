const createBoardItem = (title) => {
    let boardIconDiv = document.createElement("div");
    boardIconDiv.classList.add("board-icon");

    let redSectionDiv = document.createElement("div");
    redSectionDiv.classList.add("red-section");

    let boardTitleDiv = document.createElement("div");
    boardTitleDiv.classList.add("board-title");

    const titleNode = document.createTextNode(title);
    boardTitleDiv.appendChild(titleNode);

    boardIconDiv.appendChild(redSectionDiv);
    boardIconDiv.appendChild(boardTitleDiv);

    return boardIconDiv;
}

const onCrossClick = () => {
    let contentDiv = document.querySelector("#content");
    let cross = document.querySelector("#cross");
    contentDiv.insertBefore(createBoardItem("Board title x"), cross)
}