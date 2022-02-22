import React from "react";
import ReactDOM from "react-dom";

function Example() {
    return (
        <>
            <h1>GIFS App</h1>
            <div class="container bg-slate-900">
                <div class="row">
                    <div class="col-sm">One of three columns</div>
                    <div class="col-sm">One of three columns</div>
                    <div class="col-sm">One of three columns</div>
                </div>
            </div>
        </>
    );
}

export default Example;

if (document.getElementById("main-container")) {
    ReactDOM.render(<Example />, document.getElementById("main-container"));
}
