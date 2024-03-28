const handleSearch = (event) => {
    event.preventDefault();
    console.log("submit action handled");
};

// fetch result from input function

const fetchSearchResult = async (event) => {
    BASE_URL = "http://localhost:8000/products";
    // console.log("fetch result");

    // get search input
    const searchData = event.target.value.trim();
    if (!searchData) return;

    // request backend with search input
    const response = await fetch(`${BASE_URL}?q=${searchData}`);
    const result = await response.text();
    // replace table with result result
    const container = document.getElementById("container");
    container.innerHTML = result;
};
