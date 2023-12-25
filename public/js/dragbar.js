let isDragging = false;

function SetCursor(cursor) {
    let page = document.getElementById("page");
    page.style.cursor = cursor;
}

function StartDrag() {
    // console.log("mouse down");
    isDragging = true;

    SetCursor("ew-resize");
}

function EndDrag() {
    // console.log("mouse up");
    isDragging = false;
    SetCursor("auto");
}

// function check(event) {
//     let body = document.getElementsByTagName("body")[0];
//     document.getElementById('x').innerHTML = body.clientWidth - event.clientX;
// }

function OnDrag(event) {
    if (isDragging) {
        // console.log("Dragging");
        //console.log(event);

        let page = document.getElementById("page");
        let body = document.getElementsByTagName("body")[0];
        // let leftcol = document.getElementById("leftcol");
        // let rightcol = document.getElementById("rightcol");

        let rightColWidth = body.clientWidth - event.clientX - 12 - 16;
        let dragbarWidth = 6;
        let leftColWidth = page.clientWidth - rightColWidth;
        // document.getElementById('x').innerHTML = leftColWidth + '<br>' + rightColWidth + "<br>" + page.clientWidth;

        let cols = [
            leftColWidth,
            dragbarWidth,
            rightColWidth,
        ];

        let newColDefn = cols.map(c => c.toString() + "px").join(" ");

        // console.log(newColDefn);
        page.style.gridTemplateColumns = newColDefn;

        event.preventDefault()
    }
}
