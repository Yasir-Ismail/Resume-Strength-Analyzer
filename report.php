<?php
// report.php
session_start();

if (!isset($_SESSION['analysis'])) {
    header('Location: index.php');
    exit;
}

$analysis = $_SESSION['analysis'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CVWISE | Analysis Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">CVWISE</a>
        <a href="index.php" class="btn btn-outline-light btn-sm rounded-pill px-3">Analyze Another</a>
    </div>
</nav>

<main class="container py-5">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h2 class="fw-bold brand-primary mb-1">Your Resume Analysis Report</h2>
            <p class="text-muted">Review your insights and action items below.</p>
        </div>
    </div>

    <div class="row">
        <!-- Score Card -->
        <div class="col-lg-4 mb-4">
            <div class="score-card shadow-lg h-100 d-flex flex-column justify-content-center">
                <h4 class="mb-4">Resume Score</h4>
                <div class="score-circle">
                    <?php echo $analysis['score']; ?>
                </div>
                <div class="mt-2">
                    <span class="badge badge-readiness <?php echo $analysis['badgeClass']; ?>">
                        Level: <?php echo $analysis['readiness']; ?>
                    </span>
                </div>
            </div>
        </div>

        <!-- Insights -->
        <div class="col-lg-8 mb-4">
            <div class="card card-custom h-100 p-4">
                <div class="row">
                    <div class="col-md-6 mb-4 mb-md-0">
                        <h5 class="text-success fw-bold"><span class="section-icon">✓</span> Strengths</h5>
                        <ul class="list-group list-group-custom mt-3">
                            <?php foreach ($analysis['strengths'] as $item): ?>
                                <li class="list-group-item text-muted"><?php echo htmlspecialchars($item); ?></li>
                            <?php endforeach; ?>
                            <?php if(empty($analysis['strengths'])) echo "<li class='list-group-item text-muted'>None detected.</li>"; ?>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-danger fw-bold"><span class="section-icon">⚠</span> Weaknesses</h5>
                        <ul class="list-group list-group-custom mt-3">
                            <?php foreach ($analysis['weaknesses'] as $item): ?>
                                <li class="list-group-item text-muted"><?php echo htmlspecialchars($item); ?></li>
                            <?php endforeach; ?>
                            <?php if(empty($analysis['weaknesses'])) echo "<li class='list-group-item text-muted'>None detected! Great job.</li>"; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recommendations & Skills -->
    <div class="row mt-2">
        <div class="col-lg-7 mb-4">
            <div class="card card-custom p-4 h-100">
                <h5 class="brand-primary fw-bold mb-4">🎯 Key Recommendations</h5>
                <ul class="list-group list-group-custom">
                    <?php foreach ($analysis['suggestions'] as $item): ?>
                        <li class="list-group-item"><?php echo htmlspecialchars($item); ?></li>
                    <?php endforeach; ?>
                    <?php if(empty($analysis['suggestions'])) echo "<li class='list-group-item'>Your resume looks excellent as is!</li>"; ?>
                </ul>
            </div>
        </div>

        <div class="col-lg-5 mb-4">
            <div class="card card-custom p-4 h-100">
                <h5 class="brand-primary fw-bold mb-4">⚡ Skills Analysis</h5>
                
                <h6 class="text-muted fw-bold small text-uppercase">Detected Skills</h6>
                <div class="mb-3">
                    <?php foreach ($analysis['detectedSkills'] as $skill): ?>
                        <span class="badge bg-light text-dark border me-1 mb-1 px-2 py-1"><?php echo htmlspecialchars($skill); ?></span>
                    <?php endforeach; ?>
                    <?php if(empty($analysis['detectedSkills'])) echo "<span class='text-muted small'>No major technical skills detected.</span>"; ?>
                </div>

                <h6 class="text-muted fw-bold small text-uppercase mt-4">Suggested / Missing Skills</h6>
                <div>
                    <?php foreach ($analysis['missingSkills'] as $skill): ?>
                        <span class="badge bg-secondary me-1 mb-1 px-2 py-1"><?php echo htmlspecialchars($skill); ?></span>
                    <?php endforeach; ?>
                </div>
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
</body>
</html>