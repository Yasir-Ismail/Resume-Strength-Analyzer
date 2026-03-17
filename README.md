# CVWISE — Smart Resume Analyzer & Job Readiness Tool

> "Build a Resume That Gets You Hired."

CVWISE is a modern, SaaS-style smart resume analysis platform designed to evaluate user resumes, provide a score out of 100, identify strengths and weaknesses, and offer actionable suggestions to improve job readiness.

## Features

- **Smart Resume Input**: Paste raw resume text or use the structured manual entry form (skills, education, experience, projects).
- **Advanced Scoring System**: Generates a realistic score (0-100) based on skills presence, project depth, experience strength, and keyword relevance.
- **Intelligent Analysis**: Automatically detects missing vital sections (e.g., lack of projects or weak experience metrics).
- **Dynamic Suggestions Engine**: Provides tailored recommendations based on identified weak points (e.g., "Add at least 2 practical projects", "Use action-based sentences").
- **Skills Gap Analysis**: Detects existing technical skills and highlights missing baseline industry skills (e.g., Detected: HTML, CSS | Missing: JavaScript, Git).
- **Job Readiness Indicator**: Classifies users into three distinct tiers: *Not Ready*, *Improving*, or *Job Ready*.
- **Premium Result Dashboard**: A clean, modern UI featuring score cards, progress bars, and badge-style indicators to display the analysis report clearly.

## Tech Stack

- **Frontend**: HTML5, CSS3, Bootstrap 5, Vanilla JavaScript
- **Backend**: Native PHP 8.x
- **Database**: MySQL
- **Design System**: Custom CSS with a focus on modern SaaS aesthetics (soft shadows, rounded borders, clean typography).

## Database Overview

The system utilizes a streamlined MySQL database structure to persist user submissions and historical analysis data. Primary tables include:
- `users`: (Optional) User account management and authentication.
- `resumes`: Stores raw and parsed resume inputs.
- `analysis_results`: Stores the computed score, readiness level, detected skills, and generated suggestions linked to a specific resume.

## System Workflow

1. **Input Phase**: The user navigates to the landing page and inputs their resume via text paste or structured form.
2. **Processing Phase**: The PHP backend receives the payload and runs the smart analysis algorithms.
3. **Analysis Phase**: The system matches skills against a predefined dictionary, checks for section completeness (experience, projects), and calculates the overall score.
4. **Output Phase**: The results are saved to the database (if applicable) and returned to the frontend.
5. **Display Phase**: The user is presented with the Result Dashboard, highlighting their score, readiness level, and actionable feedback.

## How the Analysis Works

- **Skills Presence (30%)**: Checks for a baseline of demanded skills. Points are deducted for missing core technologies.
- **Projects & Experience (40%)**: Evaluates length, keyword density (action verbs), and presence of quantitative achievements.
- **Structure & Keyword Relevance (30%)**: Looks for proper sectioning, readability, and industry-standard keywords.

## Installation Instructions

1. **Clone the repository**:
   ```bash
   git clone https://github.com/Yasir-Ismail/Resume-Strength-Analyzer.git
   ```
2. **Setup the Database**:
   - Create a new MySQL database named `cvwise_db`.
   - Import the `db/schema.sql` file to generate the required tables.
3. **Configure the Environment**:
   - Update `includes/db.php` with your local database credentials (host, username, password, dbname).
4. **Run the Application**:
   - Serve the project directory directly via a local server environment (e.g., XAMPP, WAMP, Laravel Valet, or PHP built-in server):
     ```bash
     php -S localhost:8000
     ```
   - Open your browser and navigate to `http://localhost:8000/index.php`.

## Future Improvements

- Generate downloadable PDF reports.
- Provide curated CV templates based on the user's score.
- Machine Learning integration for deeper contextual text analysis.
- Connect with external Job Board APIs to suggest real open roles based on detected skills.
- Allow users to import data directly from their LinkedIn profiles.
