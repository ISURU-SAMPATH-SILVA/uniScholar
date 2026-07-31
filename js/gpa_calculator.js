// ---- GPA Calculator ----

const GRADE_POINTS = {
  Ap: 4.0, A: 4.0, An: 3.7,
  Bp: 3.3, B: 3.0, Bn: 2.7,
  Cp: 2.3, C: 2.0, Cn: 1.7,
  Dp: 1.3, D: 1.0, E: 0.0
};

document.addEventListener('DOMContentLoaded', () => {
  const universitySelect = document.getElementById('universitySelect');
  const courseCodeInput = document.getElementById('GPA-cours');

  
  const otherSelects = document.querySelectorAll('.GPA-select select:not(#universitySelect)');
  const [yearSelect, semesterSelect, creditsSelect, gradeSelect] = otherSelects;

  const resultsBar = document.querySelector('.GPA-Results');
  const resultsText = resultsBar.querySelector('p');

  let courses = [];

  const listContainer = document.createElement('div');
  listContainer.className = 'GPA-course-list';
  listContainer.style.width = '100%';
  listContainer.style.marginTop = '0.5rem';
  resultsBar.parentNode.insertBefore(listContainer, resultsBar);

  function renderList() {
    listContainer.innerHTML = '';
    if (courses.length === 0) return;

    const table = document.createElement('table');
    table.style.width = '100%';
    table.style.borderCollapse = 'collapse';
    table.style.color = 'var(--color-primary)';
    table.style.fontSize = '0.85rem';

    table.innerHTML = `
      <thead>
        <tr style="text-align:left; opacity:0.7;">
          <th style="padding:0.4rem;">Course</th>
          <th style="padding:0.4rem;">Year</th>
          <th style="padding:0.4rem;">Sem</th>
          <th style="padding:0.4rem;">Credits</th>
          <th style="padding:0.4rem;">Grade</th>
          <th style="padding:0.4rem;"></th>
        </tr>
      </thead>
    `;

    const tbody = document.createElement('tbody');
    courses.forEach((c, i) => {
      const tr = document.createElement('tr');
      tr.style.borderTop = '1px solid #2d3038';
      tr.innerHTML = `
        <td style="padding:0.4rem;">${c.code}</td>
        <td style="padding:0.4rem;">${c.year}</td>
        <td style="padding:0.4rem;">${c.semester}</td>
        <td style="padding:0.4rem;">${c.credits}</td>
        <td style="padding:0.4rem;">${c.gradeLabel}</td>
        <td style="padding:0.4rem;">
          <button type="button" class="GPA-remove-btn" data-index="${i}"
            style="background:none;border:none;color:var(--color-accent);cursor:pointer;font-weight:700;">✕</button>
        </td>
      `;
      tbody.appendChild(tr);
    });
    table.appendChild(tbody);
    listContainer.appendChild(table);

    listContainer.querySelectorAll('.GPA-remove-btn').forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.stopPropagation();
        courses.splice(Number(btn.dataset.index), 1);
        renderList();
        calculateGPA();
      });
    });
  }

  function calculateGPA() {
    if (courses.length === 0) {
      resultsText.textContent = 'Results';
      return;
    }
    let totalPoints = 0;
    let totalCredits = 0;
    courses.forEach(c => {
      totalPoints += c.credits * c.points;
      totalCredits += c.credits;
    });
    const gpa = totalCredits > 0 ? totalPoints / totalCredits : 0;
    resultsText.textContent = `GPA: ${gpa.toFixed(2)}`;
  }

  resultsBar.addEventListener('click', () => {
    const code = courseCodeInput.value.trim();
    const year = yearSelect.value;
    const semester = semesterSelect.value;
    const credits = creditsSelect.value;
    const gradeKey = gradeSelect.value;

    if (!universitySelect.value) {
      alert('University ekak select karanna.');
      return;
    }
    if (!code || !year || !semester || !credits || !gradeKey) {
      alert('Course add karanna kalin okkoma fields fill karanna.');
      return;
    }

    const points = GRADE_POINTS[gradeKey];
    if (points === undefined) {
      alert('Valid grade ekak select karanna.');
      return;
    }

    courses.push({
      code,
      year,
      semester,
      credits: Number(credits),
      gradeLabel: gradeSelect.options[gradeSelect.selectedIndex].text.trim(),
      points
    });

    renderList();
    calculateGPA();

    
    courseCodeInput.value = '';
    yearSelect.selectedIndex = 0;
    semesterSelect.selectedIndex = 0;
    creditsSelect.selectedIndex = 0;
    gradeSelect.selectedIndex = 0;
  });
});