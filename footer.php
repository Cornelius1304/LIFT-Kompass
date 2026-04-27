</main>

<footer>
    <style>
        footer {
            display: block !important;
            background: none !important;
            padding: 0 !important;
            margin-top: auto;
        }
        .footer-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: center;
            padding: 30px 5%;
            gap: 30px;
            color: white;
        }
        .row-1 {
            background: linear-gradient(135deg, #3471B8 0%, #5a9bd5 100%);
        }
        .row-2 {
            background: linear-gradient(135deg, #2a5f8a 0%, #3a7bb5 100%);
        }
        .row-3 {
            background: #024A76;
        }
        .footer-col {
            flex: 1;
            min-width: 250px;
            color: white;
        }
        .footer-col h3 {
            font-size: 1.2rem;
            margin-bottom: 15px;
            color: white;
            border-bottom: 2px solid #E3AB23;
            display: inline-block;
            padding-bottom: 6px;
        }
        .social-links, .contact-links {
            display: flex;
            flex-direction: row;
            gap: 20px;
        }
        .social-column, .contact-column {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .social-item, .contact-item {
            display: flex;
            align-items: center;
            gap: 10px;
            color: white;
            font-size: 0.85rem;
        }
        .social-item a, .contact-item a {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
            font-size: 0.85rem;
        }
        .social-item a:hover, .contact-item a:hover {
            color: #E3AB23;
        }
        .social-item svg, .contact-item svg {
            flex-shrink: 0;
            width: 18px;
            height: 18px;
        }
        .contact-item span {
            line-height: 1.4;
            font-size: 0.85rem;
        }
        .footer-col p {
            font-size: 0.85rem;
            line-height: 1.4;
        }
        .placeholder-text {
            font-style: italic;
            opacity: 0.8;
        }
        @media (max-width: 768px) {
            .footer-row {
                flex-direction: column;
                text-align: center;
                padding: 25px 20px;
            }
            .footer-col h3 {
                display: block;
                text-align: center;
            }
            .social-links, .contact-links {
                flex-direction: column;
            }
            .social-item, .contact-item {
                justify-content: center;
            }
        }
    </style>

    <div class="footer-row row-1">
        <div class="footer-col">
            <h3>Social Media</h3>
            <div class="social-links">
                <div class="social-column">
                    <div class="social-item">
                        <svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 0 448 512" width="18px" fill="currentColor">
                            <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                        </svg>
                        <a href="https://www.instagram.com/lit.kompass/" target="_blank">Instagram</a>
                    </div>
                </div>
                <div class="social-column">
                    <div class="social-item">
                        <svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 0 448 512" width="18px" fill="currentColor">
                            <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64h98.2V334.2H109.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H255V480H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z"/>
                        </svg>
                        <a href="https://www.facebook.com/people/Lit-Kompass/100067620100339/" target="_blank">Facebook</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer-col">
            <h3>Kontakt</h3>
            <div class="contact-links">
                <div class="contact-column">
                    <div class="contact-item">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16px" viewBox="0 -960 960 960" width="16px" fill="currentColor">
                            <path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z"/>
                        </svg>
                        <a href="mailto:kompass.lit@e-uvt.ro">kompass.lit@e-uvt.ro</a>
                    </div>
                </div>
                <div class="contact-column">
                    <div class="contact-item">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16px" viewBox="0 -960 960 960" width="16px" fill="currentColor">
                            <path d="M480-480q33 0 56.5-23.5T560-560q0-33-23.5-56.5T480-640q-33 0-56.5 23.5T400-560q0 33 23.5 56.5T480-480Zm0 294q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186Zm0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Z"/>
                        </svg>
                        <span>B-dul Vasile Pârvan nr. 4,<br>300223 Timișoara, România</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer-row row-2">
        <div class="footer-col">
            <h3>Platzhalter 1</h3>
            <p>Inhalt folgt in Kürze</p>
        </div>
        <div class="footer-col">
            <h3>Platzhalter 2</h3>
            <p>Inhalt folgt in Kürze</p>
        </div>
    </div>
    
    <div class="footer-row row-3">
        <div class="footer-col">
            <img src="FLIFT-02.png" width="120px" style="filter: brightness(0) invert(1);">
        </div>
        <div class="footer-col">
            <p>&copy; <?php echo date('Y'); ?> LIT Kompass - Alle Rechte vorbehalten</p>
        </div>
        <div class="footer-col">
            <p>West-Universität Temeswar<br>Fakultät für Philologie, Geschichte, Philosophie und Theologie</p>
        </div>
    </div>
</footer>

<?php include_once 'mobile-nav.php'; ?>

</body>
</html>