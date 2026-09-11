document.addEventListener('DOMContentLoaded', () => {
  // Chart Colors Setup
  const colorPrimary = '#0F9D58'; // RentSriLanka Primary Green
  const colorNavy = '#102A43';    // RentSriLanka Dark Navy
  const colorTeal = '#0d9488';
  const colorWarning = '#f59e0b';
  const colorDanger = '#ef4444';
  const colorPurple = '#9333ea';

  // Chart 1: New Users Growth (Line Chart)
  const ctxUsers = document.getElementById('chartNewUsers')?.getContext('2d');
  if (ctxUsers) {
    new Chart(ctxUsers, {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
        datasets: [
          {
            label: 'Renters',
            data: [210, 280, 350, 420, 510, 600, 680, 750, 820],
            borderColor: colorPrimary,
            backgroundColor: 'rgba(15, 157, 88, 0.1)',
            fill: true,
            tension: 0.4,
            borderWidth: 2
          },
          {
            label: 'Owners',
            data: [80, 95, 120, 140, 180, 210, 240, 260, 290],
            borderColor: colorNavy,
            backgroundColor: 'rgba(16, 42, 67, 0.05)',
            fill: true,
            tension: 0.4,
            borderWidth: 2
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { position: 'top', labels: { boxWidth: 12, font: { family: 'Inter', size: 11 } } }
        },
        scales: {
          x: { grid: { display: false } },
          y: { grid: { color: '#f1f5f9' }, ticks: { font: { family: 'Inter', size: 11 } } }
        }
      }
    });
  }

  // Chart 2: New Properties Submissions vs Approvals (Bar Chart)
  const ctxProperties = document.getElementById('chartNewProperties')?.getContext('2d');
  if (ctxProperties) {
    new Chart(ctxProperties, {
      type: 'bar',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
        datasets: [
          {
            label: 'Approved',
            data: [120, 145, 160, 190, 220, 240, 270, 310, 330],
            backgroundColor: colorPrimary,
            borderRadius: 4
          },
          {
            label: 'Pending / Rejected',
            data: [20, 25, 18, 30, 22, 19, 28, 24, 21],
            backgroundColor: colorWarning,
            borderRadius: 4
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { position: 'top', labels: { boxWidth: 12, font: { family: 'Inter', size: 11 } } }
        },
        scales: {
          x: { grid: { display: false } },
          y: { grid: { color: '#f1f5f9' }, ticks: { font: { family: 'Inter', size: 11 } } }
        }
      }
    });
  }

  // Chart 3: Property Types Breakdown (Doughnut Chart)
  const ctxTypes = document.getElementById('chartPropertyTypes')?.getContext('2d');
  if (ctxTypes) {
    new Chart(ctxTypes, {
      type: 'doughnut',
      data: {
        labels: ['Houses', 'Boarding Rooms', 'Annexes'],
        datasets: [{
          data: [980, 650, 550],
          backgroundColor: [colorNavy, colorPrimary, colorTeal],
          borderWidth: 2,
          borderColor: '#ffffff'
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { position: 'bottom', labels: { boxWidth: 12, font: { family: 'Inter', size: 11 } } }
        },
        cutout: '70%'
      }
    });
  }

  // Chart 4: Properties by District (Horizontal Bar Chart)
  const ctxDistrict = document.getElementById('chartPropertiesDistrict')?.getContext('2d');
  if (ctxDistrict) {
    new Chart(ctxDistrict, {
      type: 'bar',
      data: {
        labels: ['Colombo', 'Kandy', 'Gampaha', 'Galle', 'Kurunegala', 'Kalutara'],
        datasets: [{
          label: 'Active Listings',
          data: [840, 480, 320, 240, 180, 120],
          backgroundColor: colorNavy,
          borderRadius: 4
        }]
      },
      options: {
        indexAxis: 'y',
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { display: false }
        },
        scales: {
          x: { grid: { color: '#f1f5f9' } },
          y: { grid: { display: false }, ticks: { font: { family: 'Inter', size: 11 } } }
        }
      }
    });
  }
});