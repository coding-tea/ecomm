<div class="border-t-2 border-gray-300 flex flex-col md:flex-row md:justify-between text-center py-5 text-sm">
  <div class="mb-4">
    <a href="#" class="mx-2.5">About</a>
    <a href="#" class="mx-2.5">Privacy Policy</a>
    <a href="#" class="mx-2.5">Terms of Services</a>
  </div>
  <p>&copy; Copyright Reserved 2023</p>
</div><!-- Footer Section -->
</div>

<script>
function showFilters() {
    var fSection = document.getElementById("filterSection");
    if (fSection.classList.contains("hidden")) {
        fSection.classList.remove("hidden");
        fSection.classList.add("block");
    } else {
        fSection.classList.add("hidden");
    }
}

function applyFilters() {
    document.querySelectorAll("input[type=checkbox]").forEach((el) => (el.checked = false));
}

function closeFilterSection() {
    var fSection = document.getElementById("filterSection");
    fSection.classList.add("hidden");
}


//login page
document.querySelector('#password').style = 'display:none';
document.querySelector('#forgot').onclick = ()=> {
    document.querySelector('#password').style = 'display:block';
    document.querySelector('#normal').style = 'display:none';
};
document.querySelector('#login').onclick = ()=> {
    document.querySelector('#password').style = 'display:none';
    document.querySelector('#normal').style = 'display:block';
};
</script>
<script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
<script src='https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js' ></script>
</body>
</html>