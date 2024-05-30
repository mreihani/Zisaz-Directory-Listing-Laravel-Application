function downloadSVG() {
    const svg = document.getElementById('container').innerHTML;
    const blob = new Blob([svg.toString()]);
    const element = document.createElement("a");
    element.download = "zisaz.svg";
    element.href = window.URL.createObjectURL(blob);
    element.click();
    element.remove();
}