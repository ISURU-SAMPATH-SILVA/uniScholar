
<<<<<<< HEAD
  <div class="search-container">
    <input 
      type="text" 
      id="searchInput" 
      class="main-search-input" 
      placeholder="Search..." 
      onfocus="showAllDropdown()" 
      onkeyup="filterSearch()"
      autocomplete="off"
    >
    <button type="button" id="searchBtn" class="search-btn" onclick="executeSearch()">Search</button>
=======
 <div class="search-container">
  <input type="text" id="searchInput" placeholder="Search..." onkeyup="filterSearch()">
  <button type="submit" class="search-btn">Search</button>
  
  <ul id="searchDropdown" class="dropdown-menu">
    <li><a href="gpa-calculator.php">GPA Calculator</a></li>
    <li><a href="course-modules.php">Course Modules</a></li>
    <li><a href="past-papers.php">Past Papers</a></li>
    <li><a href="timetable-calendar.php">Timetable & Calendar</a></li>
    <li><a href="about-unschoolar.php">About UniScholar</a></li>
  </ul>
</div>
>>>>>>> 15d33f6d37771e47f8ffb6c898e1e35d65f7c678

    <ul id="searchDropdown" class="dropdown-menu">
      <li><a href="/uniScholar/index.php">Home</a></li>
      <li><a href="/uniScholar/components/Explore.php">Explore</a></li>
      <li><a href="/uniScholar/components/Course.php">Timetable & Calendar</a></li>
      <li><a href="/uniScholar/components/About.php">About UniScholar</a></li>
      <li><a href="/uniScholar/components/GPA.php">GPA calculators</a></li>
    </ul>
  </div>

  <script>
    function showAllDropdown() {
      let dropdown = document.getElementById('searchDropdown');
      let li = dropdown.getElementsByTagName('li');
      
      for (let i = 0; i < li.length; i++) {
        li[i].style.display = "block";
      }
      dropdown.style.display = 'block';
    }

    function filterSearch() {
      let input = document.getElementById('searchInput');
      let filter = input.value.toLowerCase();
      let dropdown = document.getElementById('searchDropdown');
      let li = dropdown.getElementsByTagName('li');
      let hasResults = false;

<<<<<<< HEAD
      for (let i = 0; i < li.length; i++) {
        let a = li[i].getElementsByTagName('a')[0];
        let txtValue = a.textContent || a.innerText;
        
        if (txtValue.toLowerCase().indexOf(filter) > -1) {
          li[i].style.display = "block";
          hasResults = true;
        } else {
          li[i].style.display = "none";
        }
      }

      dropdown.style.display = hasResults ? 'block' : 'none';
    }

    document.querySelectorAll('#searchDropdown li a').forEach(item => {
      item.addEventListener('click', function(e) {
        document.getElementById('searchInput').value = this.textContent.trim();
        document.getElementById('searchInput').setAttribute('data-selected-url', this.getAttribute('data-url'));
      });
    });

    function executeSearch() {
      let input = document.getElementById('searchInput');
      let query = input.value.trim().toLowerCase();
      let selectedUrl = input.getAttribute('data-selected-url');

      if (selectedUrl) {
        window.location.href = selectedUrl;
        return;
      }

      if (query.includes('home')) {
        window.location.href = 'index.php';
      } else if (query.includes('explore')) {
        window.location.href = 'explore.php';
      } else if (query.includes('calendar') || query.includes('timetable')) {
        window.location.href = 'calendar.php';
      } else if (query.includes('about')) {
        window.location.href = 'about.php';
      } else if (query.includes('gpa')) {
        window.location.href = 'gpa.php';
      } else if (query !== "") {
        window.location.href = 'search-results.php?q=' + encodeURIComponent(query);
      }
    }

    document.getElementById('searchInput').addEventListener('keypress', function(e) {
      if (e.key === 'Enter') {
        e.preventDefault();
        executeSearch();
      }
    });

    document.addEventListener('click', function(e) {
      let searchContainer = document.querySelector('.search-container');
      let dropdown = document.getElementById('searchDropdown');
      
      if (searchContainer && !searchContainer.contains(e.target)) {
        dropdown.style.display = 'none';
      }
    });
  </script>
=======
document.addEventListener('click', function(e) {
  let searchContainer = document.querySelector('.search-container');
  let dropdown = document.getElementById('searchDropdown');
  
  if (!searchContainer.contains(e.target)) {
    dropdown.style.display = 'none';
  }
});
</script>   
>>>>>>> 15d33f6d37771e47f8ffb6c898e1e35d65f7c678
