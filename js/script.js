// Prevent form submission and handle the generation of random numbers
document
  .getElementById("randomNumberForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    // Parse input values
    const lowerBound = parseInt(
      document.getElementById("lowerBound").value,
      10
    );
    const upperBound = parseInt(
      document.getElementById("upperBound").value,
      10
    );

    // Validate input values
    if (lowerBound >= upperBound) {
      const errorMessage = document.getElementById("error-message");
      errorMessage.textContent =
        "The lower bound must be less than the upper bound.";
      errorMessage.classList.remove("d-none");
      return;
    } else {
      document.getElementById("error-message").classList.add("d-none");
    }

    // Fetch request to server
    fetch("random.php", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: `lowerBound=${lowerBound}&upperBound=${upperBound}`,
    })
      .then((response) => response.text())
      .then((text) => {
        document.getElementById(
          "result"
        ).innerHTML = `Generated Number: <strong>${text}</strong>`;
        addToHistory(text);
        changeBackgroundColor();
      })
      .catch((error) => console.error("Error:", error));
  });

// Change the background & button color of the page
function changeBackgroundColor() {
  const randomColor = colors[Math.floor(Math.random() * colors.length)];
  document.getElementById("backgroundBody").style.backgroundColor = randomColor;
}

// Copy the generated number to clipboard
function copyToClipboard() {
  let resultText = document.getElementById("result").textContent;
  if (!resultText) {
    showAlert("Please generate a number to copy!");
    return;
  }
  resultText = resultText?.split(":")[1].trim();
  navigator.clipboard
    .writeText(resultText)
    .then(() =>
      showAlert("Number copied to clipboard!🎉", 3000, "#288049", "#a1f0bf")
    )
    .catch((err) => showAlert(`Failed to copy: ${err}`));
}

// Show different sections (Generator, Slider, History) based on user interaction
function showSection(sectionId) {
  document.querySelectorAll(".content-section").forEach((section) => {
    section.style.display = "none";
  });
  document.getElementById(sectionId).style.display = "block";
  if (sectionId === "plot") {
    document.getElementById("plotExplanation").style.display = "block";
    drawScatterPlot();
  }
}
showSection("generator");

let allNumbers = [];
let numberFrequencies = {};

function updateFrequencies(number) {
  if (numberFrequencies[number]) {
    numberFrequencies[number] += 1;
  } else {
    numberFrequencies[number] = 1;
  }
  allNumbers.push(number);
}

function drawScatterPlot() {
  // generate array from 1 to allNumbers.length for x-axis
  const x = [...Array(allNumbers.length).keys()].map((i) => i + 1);
  const y = allNumbers;

  const trace = {
    x: x,
    y: y,
    mode: "markers",
    type: "scatter",
    marker: { size: 8 },
  };

  const layout = {
    title: "Random Number Generation Plot",
    xaxis: { title: "Generation Order" },
    yaxis: { title: "Generated Number" },
  };

  Plotly.newPlot("plotContainer", [trace], layout);
}

// Add generated number to the history log
function addToHistory(number) {
  updateFrequencies(number);

  const historyDiv = document.getElementById("historyLog");
  const noHistoryMessage = document.getElementById("noHistoryMessage");
  if (noHistoryMessage) {
    noHistoryMessage.style.display = "none";
  }

  const entry = document.createElement("div");
  entry.textContent = `${new Date().toLocaleString()}: Generated Number - ${number}`;
  historyDiv.prepend(entry);

  if (noHistoryMessage) {
    noHistoryMessage.remove();
  }
}

// Display dynamic alerts with customizable colors and auto-dismiss
function showAlert(
  message,
  duration = 3000,
  backgroundColor = "#f8d7da",
  textColor = "#721c24"
) {
  const alertContainer = document.getElementById("alertContainer");
  const alertMessage = document.createElement("div");
  alertMessage.classList.add("alert-message");
  alertMessage.textContent = message;
  alertMessage.style.backgroundColor = backgroundColor;
  alertMessage.style.color = textColor;

  alertContainer.appendChild(alertMessage);

  setTimeout(() => {
    alertMessage.style.animation = "slideOut 0.5s forwards";
    setTimeout(() => alertMessage.remove(), 500);
  }, duration);

  alertMessage.addEventListener("click", () => {
    alertMessage.style.animation = "slideOut 0.5s forwards";
    setTimeout(() => alertMessage.remove(), 500);
  });
}

// List of colors for background change
const colors = [
  "#ff7f50",
  "#6495ed",
  "#ffa500",
  "#8a2be2",
  "#e9967a",
  "#ff6347",
  "#4682b4",
  "#deb887",
  "#5f9ea0",
  "#d2691e",
  "#b22222",
  "#ff4500",
  "#9acd32",
  "#2e8b57",
  "#da70d6",
  "#6b8e23",
  "#4169e1",
  "#8b4513",
  "#fa8072",
  "#2f4f4f",
  "#32cd32",
  "#87ceeb",
  "#6a5acd",
  "#708090",
  "#ff69b4",
  "#cd5c5c",
  "#f08080",
  "#008080",
  "#b03060",
  "#ff1493",
  "#7b68ee",
  "#c71585",
  "#000080",
  "#483d8b",
  "#800080",
  "#556b2f",
  "#66cdaa",
  "#00ced1",
  "#1e90ff",
  "#c0c0c0",
  "#ffd700",
  "#bdb76b",
  "#4b0082",
  "#f0e68c",
  "#add8e6",
  "#f08080",
  "#90ee90",
  "#d3d3d3",
  "#ffb6c1",
  "#ffff54",
  "#20b2aa",
  "#778899",
  "#b0c4de",
  "#ffe4c4",
  "#ffebcd",
];
