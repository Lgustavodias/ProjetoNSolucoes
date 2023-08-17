let timeoutId;
let overlayDiv = document.querySelector(".overlay");

function hideLoading() {
    if (overlayDiv) {
        const progressBar = overlayDiv.querySelector(".progress-bar");

        progressBar.style.width = "100%";
        progressBar.style.animation = `progressAnimationStrike 1ms linear forwards`;

        overlayDiv.remove();
    }

    clearTimeout(timeoutId);
}

function showLoading(loadingText = 'Aguarde enquanto consultamos as informações...') {
    if (overlayDiv) {
        overlayDiv.remove();
    }

    overlayDiv = document.createElement('div');
    overlayDiv.classList.add('overlay');
    document.body.appendChild(overlayDiv);

    const textDiv = document.createElement('div');
    textDiv.classList.add('text');
    textDiv.textContent = loadingText;
    overlayDiv.appendChild(textDiv);

    const progressDiv = document.createElement('div');
    progressDiv.classList.add('progress', 'progress-striped');

    divprogressBar = document.createElement('div');
    divprogressBar.classList.add('progress-bar');

    progressDiv.appendChild(divprogressBar);
    overlayDiv.appendChild(progressDiv);

    timeoutId = setTimeout(hideLoading, 60000);
}