<?php
// index.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CVWISE | Smart Resume Analyzer & Job Readiness Tool</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">CVWISE</a>
    </div>
</nav>

<main class="container py-5">
    <div class="row justify-content-center text-center mb-5">
        <div class="col-lg-8">
            <h1 class="display-4 fw-bold brand-primary mb-3">Build a Resume That Gets You Hired.</h1>
            <p class="lead text-muted">Paste your resume below to get an instant smart analysis, discover skill gaps, and find out your job readiness level.</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card card-custom p-4">
                <form id="analyzeForm" action="analyze.php" method="POST">
                    <div class="mb-4">
                        <label for="resumeText" class="form-label fw-bold pb-2">Paste Your Resume Content</label>
                        <textarea class="form-control textarea-custom" id="resumeText" name="resumeText" rows="12" placeholder="Paste skills, education, experience, and projects here..."></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" id="analyzeBtn" class="btn btn-primary-custom btn-lg px-5 py-3 shadow-sm rounded-pill">Analyze My Resume</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<footer class="bg-primary-dark text-white text-center py-4 mt-5">
    <div class="container">
        <p class="mb-0">&copy; <?php echo date("Y"); ?> CVWISE. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>