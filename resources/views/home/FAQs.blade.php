<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroLink - Title Deed Verification FAQs</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Consistent with your AgroLink theme */
        :root {
            --agro-green: #2a7d2e;
            --agro-light: #f5f9f5;
        }
        
        body {
            font-family: 'Segoe UI', sans-serif;
            line-height: 1.6;
            color: #333;
            background: var(--agro-light);
            padding: 0;
            margin: 0;
        }
        
        .faq-container {
            max-width: 800px;
            margin: 80px auto 40px;
            padding: 0 20px;
        }
        
        h1 {
            color: var(--agro-green);
            text-align: center;
            margin-bottom: 40px;
        }
        
        .faq-item {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 15px;
            overflow: hidden;
            border: 1px solid #e0e0e0;
        }
        
        .faq-question {
            padding: 18px 20px;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .faq-question:hover {
            background: #f9f9f9;
        }
        
        .faq-question::after {
            content: '\f078';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            transition: transform 0.3s;
        }
        
        .faq-item.active .faq-question::after {
            transform: rotate(180deg);
        }
        
        .faq-answer {
            padding: 0 20px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s, padding 0.3s;
        }
        
        .faq-item.active .faq-answer {
            padding: 0 20px 20px;
            max-height: 500px;
        }
        
        .faq-answer ol {
            padding-left: 20px;
        }
        
        .faq-answer li {
            margin-bottom: 10px;
        }
        
        .note {
            background: #fff8e1;
            padding: 15px;
            border-left: 4px solid #ffc107;
            margin: 20px 0;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="faq-container">
        <h1>Title Deed Verification FAQs</h1>
        
        <!-- FAQ 1 -->
        <div class="faq-item">
            <div class="faq-question">
                Step-by-Step Guide to Verify a Title Deed Online via Ardhisasa
            </div>
            <div class="faq-answer">
                <ol>
                    <li><strong>Visit Ardhisasa Platform</strong>: Go to ardhisasa.lands.go.ke and login or create an account.</li>
                    <li><strong>Access Land Search</strong>: Navigate to the "Land Search" section from the dashboard.</li>
                    <li><strong>Enter Title Details</strong>: Input the title deed number you want to verify.</li>
                    <li><strong>Review Results</strong>: The system will display:
                        <ul>
                            <li>Registered owner details</li>
                            <li>Parcel location and size</li>
                            <li>Any encumbrances (charges/caveats)</li>
                        </ul>
                    </li>
                    <li><strong>Download Report</strong>: For official records, download the search certificate (fee applies).</li>
                </ol>
                <div class="note">
                    <i class="fas fa-lightbulb"></i> Ardhisasa verification typically takes 5-10 minutes for clean titles. Complex cases may require manual review.
                </div>
            </div>
        </div>
        
        <!-- FAQ 2 -->
        <div class="faq-item">
            <div class="faq-question">
                Manual Title Deed Verification at a Land Registry
            </div>
            <div class="faq-answer">
                <ol>
                    <li><strong>Visit the Registry</strong>: Go to your county's land registry office (Nairobi: Ardhi House, Mombasa: NSSF Building).</li>
                    <li><strong>Request Search Form</strong>: Obtain and fill out Form RL 26 (Search Application).</li>
                    <li><strong>Submit Requirements</strong>:
                        <ul>
                            <li>Completed form</li>
                            <li>Copy of title deed (or number)</li>
                            <li>KSH 500 fee payment slip</li>
                            <li>Your ID/passport</li>
                        </ul>
                    </li>
                    <li><strong>Wait for Processing</strong>: Manual searches take 3-7 working days.</li>
                    <li><strong>Collect Results</strong>: Return to collect the official search report showing:
                        <ul>
                            <li>Current ownership</li>
                            <li>Survey details</li>
                            <li>Legal status</li>
                        </ul>
                    </li>
                </ol>
            </div>
        </div>
        
        <!-- FAQ 3 -->
        <div class="faq-item">
            <div class="faq-question">
                Signs of a Fake Title Deed in Kenya
            </div>
            <div class="faq-answer">
                <ol>
                    <li><strong>Physical Document Checks</strong>:
                        <ul>
                            <li>Watermark should show "Republic of Kenya" when held to light</li>
                            <li>Serial number format: [County Code]/[Volume]/[Number] (e.g., NBI/123/456)</li>
                            <li>Security threads (like in currency notes)</li>
                        </ul>
                    </li>
                    <li><strong>Content Red Flags</strong>:
                        <ul>
                            <li>Spelling errors in official names</li>
                            <li>Missing registrar's stamp/signature</li>
                            <li>Inconsistent parcel numbers (cross-check with survey maps)</li>
                        </ul>
                    </li>
                    <li><strong>Verification Discrepancies</strong>:
                        <ul>
                            <li>Ardhisasa shows different owner than document</li>
                            <li>Registry staff cannot locate records</li>
                            <li>Seller refuses official verification</li>
                        </ul>
                    </li>
                </ol>
                <div class="note">
                    <i class="fas fa-exclamation-triangle"></i> Always verify through both online and physical channels if purchasing high-value land.
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', () => {
                const item = question.parentNode;
                item.classList.toggle('active');
                
                // Close other open items
                document.querySelectorAll('.faq-item').forEach(otherItem => {
                    if (otherItem !== item && otherItem.classList.contains('active')) {
                        otherItem.classList.remove('active');
                    }
                });
            });
        });
    </script>



</body>
</html>