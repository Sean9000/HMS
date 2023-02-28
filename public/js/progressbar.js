
const progress = document.querySelector("#progress");
const prev = document.querySelector("#prev");
const next = document.querySelector("#next");
const circles = document.querySelectorAll(".circle");

const update = () => {
    circles.forEach((circle, i) => {
        i < currActive
            ? circle.classList.add("active")
            : circle.classList.remove("active");
    });

    const actives = document.querySelectorAll(".active");
    const width = ((actives.length - 1) / (circles.length - 1)) * 100;
    progress.style.width = `${width}%`;

    if (currActive === 1) {
        prev.disabled = true;
    } else if (currActive === circles.length) {
        next.disabled = true;
    } else {
        prev.disabled = false;
        next.disabled = false;
    }
};

let currActive = 1;

next.addEventListener("click", () => {
    currActive++;

    if (currActive > circles.length) {
        currActive = circles.length;
    }
    update();
});
prev.addEventListener("click", () => {
    currActive--;

    if (currActive < 1) {
        currActive = 1;
    }
    update();
});