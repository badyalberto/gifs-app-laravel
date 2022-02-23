function copyClipboard(url) {
    navigator.clipboard.writeText(url);
    let newContent =
        "<div id=\"notificacion\" class=\"bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md\">\n" +
        "        <div class=\"flex\">\n" +
        "            <div class=\"py-1\">\n" +
        "                <svg class=\"fill-current h-6 w-6 text-teal-500 mr-4\"  height='25px' xmlns=\"http://www.w3.org/2000/svg\"\n" +
        "                     viewBox=\"0 0 20 20\">\n" +
        "                    <path\n" +
        "                        d=\"M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z\" fill='black'/>\n" +
        "                </svg>\n" +
        "            </div>\n" +
        "            <div>\n" +
        "                <p class=\"font-bold text-black\">Copied</p>\n" +
        "                <p class=\"text-sm text-black\">URL copied to your clipboard</p>\n" +
        "            </div>\n" +
        "        </div>\n" +
        "    </div>";
    document.querySelector('#title').insertAdjacentHTML("afterend", newContent);

    setTimeout(function (){
        document.getElementById('notificacion').style.display = "none";
    },3000);
}

document.addEventListener("DOMContentLoaded", function (event) {
    if (document.getElementById('file'))
        document.getElementById('file').addEventListener('change', toggleInput);
});

function toggleInput() {
    console.log(document.getElementById('file').files.length);
    if (document.getElementById('file').files.length !== 0) {
        document.getElementById('url').removeAttribute('required');
        document.getElementById('url').setAttribute('disabled', 'true');
    } else {
        document.getElementById('url').removeAttribute('disabled');
        document.getElementById('url').setAttribute('required', 'true');
    }

}


