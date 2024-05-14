<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Number Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body id="backgroundBody" class="d-flex justify-content-center align-items-center">
    <div class="card">
        <div class="card-body">
            <div class="btn-group-centered">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-secondary" onclick="showSection('generator')">Generator</button>
                    <button type="button" class="btn btn-secondary" onclick="showSection('plot')">Plot</button>
                    <button type="button" class="btn btn-secondary" onclick="showSection('history')">History</button>
                </div>
            </div>
            <div id="generator" class="content-section">
                <h5 class="card-title text-center">Random Number Generator</h5>
                <form id="randomNumberForm" method="post">
                    <div class="mb-3">
                        <label for="lowerBound" class="form-label">Lower Bound:</label>
                        <input type="number" value="1" class="form-control" id="lowerBound" name="lowerBound" required>
                    </div>
                    <div class="mb-3">
                        <label for="upperBound" class="form-label">Upper Bound:</label>
                        <input type="number" value="100" class="form-control" id="upperBound" name="upperBound" required>
                    </div>
                    <div class="alert alert-danger d-none" id="error-message"></div>
                    <button type="submit" class="btn btn-primary">Generate</button>
                    <button type="button" class="btn btn-outline-secondary" style="padding-top: 4px; padding-bottom: 8px;" onclick="copyToClipboard()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z"/>
                        </svg>
                    </button>
                </form>
                <div id="result" class="mt-3"></div>
            </div>
            <div id="history" class="content-section" style="display:none;">
                <h5 class="card-title text-center">History Log</h5>
                <div id="historyLog" class="history-container">
                    <div id="noHistoryMessage">No generated numbers yet.</div>
                </div>
            </div>
            <div id="plot" class="content-section" style="display:none;">
                <h5 class="card-title text-center">Scatter Plot of Generated Numbers</h5>
                <div id="plotContainer"></div>
                <div id="plotExplanation" class="content-section" style="display:none;">
                    <p>
                        This plot displays each generated number in sequence, showcasing the randomness of our number generator. In a truly random sequence:
                        <ul>
                            <li><strong>Uniform Distribution</strong>: Numbers are evenly spread across the range without clustering.</li>
                            <li><strong>No Predictable Patterns</strong>: There are no trends or patterns, making each number's position independent of others.</li>
                            <li><strong>Independence</strong>: Knowing one number gives no information about others.</li>
                        </ul>
                        This visualization helps you see how the numbers are dispersed and whether there are any visible patterns, providing a practical insight into the randomness of the process.
                    </p>
                </div>

            </div>
        </div>
    </div>
    <div id="alertContainer" class="alert-container"></div>
    <script src="js/script.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</body>

</html>

