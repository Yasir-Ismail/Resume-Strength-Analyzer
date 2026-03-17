document.addEventListener('DOMContentLoaded', function() {
    const analyzeForm = document.getElementById('analyzeForm');
    
    if (analyzeForm) {
        analyzeForm.addEventListener('submit', function(e) {
            const resumeInput = document.getElementById('resumeText').value;
            if (resumeInput.trim() === '') {
                e.preventDefault();
                alert('Please paste your resume content before analyzing.');
            } else {
                // Show loading state
                const btn = document.getElementById('analyzeBtn');
                btn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Analyzing...';
                btn.disabled = true;
            }
        });
    }
});
