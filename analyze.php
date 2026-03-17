<?php
// analyze.php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$resumeText = $_POST['resumeText'] ?? '';
$resumeTextLower = strtolower($resumeText);

// --- Dummy Analysis Logic Engine ---

$score = 40; // Base score
$strengths = [];
$weaknesses = [];
$suggestions = [];
$detectedSkills = [];

// 1. Length & Structure Check
if (str_word_count($resumeText) > 200) {
    $score += 15;
    $strengths[] = "Good overall length and detail.";
} else {
    $weaknesses[] = "Resume is too brief.";
    $suggestions[] = "Expand on your experience and provide more context about your responsibilities.";
}

// 2. Experience & Action Verbs Check
$actionVerbs = ['developed', 'managed', 'created', 'led', 'designed', 'improved', 'increased'];
$foundVerbs = 0;
foreach ($actionVerbs as $verb) {
    if (strpos($resumeTextLower, $verb) !== false) {
        $foundVerbs++;
    }
}
if ($foundVerbs > 2) {
    $score += 15;
    $strengths[] = "Strong use of action verbs in experience section.";
} else {
    $weaknesses[] = "Weak experience descriptions.";
    $suggestions[] = "Use action-based sentences (e.g., 'Developed X', 'Improved Y by Z%').";
}

// 3. Projects Check
if (strpos($resumeTextLower, 'project') !== false || strpos($resumeTextLower, 'github') !== false) {
    $score += 15;
    $strengths[] = "Projects section identified.";
} else {
    $weaknesses[] = "No projects mentioned.";
    $suggestions[] = "Add at least 2 practical projects to showcase your hands-on ability.";
}

// 4. Skills Parsing
$commonSkills = ['html', 'css', 'javascript', 'php', 'mysql', 'python', 'react', 'node', 'git', 'agile'];
$missingSkills = [];

foreach ($commonSkills as $skill) {
    if (strpos($resumeTextLower, $skill) !== false) {
        $detectedSkills[] = strtoupper($skill);
        $score += 2; // Add points per skill
    } else {
        $missingSkills[] = strtoupper($skill);
    }
}

if (count($detectedSkills) > 3) {
    $strengths[] = "Good coverage of technical skills.";
} else {
    $weaknesses[] = "Technical skills are lacking.";
    $suggestions[] = "Add relevant technical and tool-based skills based on your target job.";
}

// Cap score at 100
$score = min($score, 100);

// Readiness Level
$readiness = 'Not Ready';
$badgeClass = 'badge-not-ready';
if ($score >= 75) {
    $readiness = 'Job Ready';
    $badgeClass = 'badge-ready';
} elseif ($score >= 50) {
    $readiness = 'Improving';
    $badgeClass = 'badge-improving';
}

// Save to Session to pass to report.php
$_SESSION['analysis'] = [
    'score' => $score,
    'readiness' => $readiness,
    'badgeClass' => $badgeClass,
    'strengths' => $strengths,
    'weaknesses' => $weaknesses,
    'suggestions' => $suggestions,
    'detectedSkills' => $detectedSkills,
    'missingSkills' => array_slice($missingSkills, 0, 5) // Suggest only a few missing
];

// Optionally insert into Database here (requires configured db.php)
// require_once 'includes/db.php';
// if(isset($pdo)) { ... insert logic ... }

header('Location: report.php');
exit;
?>