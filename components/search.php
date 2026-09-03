 
 <div class="search-conterner">
    <form class="d-flex" role="search">
     <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
     <button class="btn btn-outline-success" type="submit">Search</button>
 </form>
 </div>

 <div class="search-container">
  <input type="text" id="searchInput" placeholder="Search..." onkeyup="filterSearch()">
  <button type="submit" class="search-btn">Search</button>
  
  <ul id="searchDropdown" class="dropdown-menu">
    <li><a href="#">GPA Calculator</a></li>
    <li><a href="#">Course Modules</a></li>
    <li><a href="#">Past Papers</a></li>
    <li><a href="#">Timetable & Calendar</a></li>
    <li><a href="#">About UniScholar</a></li>
  </ul>
</div>

<script>
function filterSearch() {
  let input = document.getElementById('searchInput');
  let filter = input.value.toLowerCase();
  let dropdown = document.getElementById('searchDropdown');
  let li = dropdown.getElementsByTagName('li');
  let hasResults = false;

  if (filter.length === 0) {
    dropdown.style.display = 'none';
    return;
  }

  for (let i = 0; i < li.length; i++) {
    let a = li[i].getElementsByTagName('a')[0];
    let txtValue = a.textContent || a.innerText;
    
    if (txtValue.toLowerCase().indexOf(filter) > -1) {
      li[i].style.display = "";
      hasResults = true;
    } else {
      li[i].style.display = "none";
    }
  }

  dropdown.style.display = hasResults ? 'block' : 'none';
}

// Search bar eken eliye click kalama dropdown eka close wenna
document.addEventListener('click', function(e) {
  let searchContainer = document.querySelector('.search-container');
  let dropdown = document.getElementById('searchDropdown');
  
  if (!searchContainer.contains(e.target)) {
    dropdown.style.display = 'none';
  }
});
</script>   