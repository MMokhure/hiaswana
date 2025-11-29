     <style>
       
        .section-padding {
            padding-top: 40px;
            padding-bottom: 80px;
        }
        
        .section-title {
            color: var(--heading-color);
            font-weight: 700;
            margin-bottom: 6px; /* reduced gap to subtitle */
        }
        
        .section-subtitle {
            color: color-mix(in srgb, var(--default-color), transparent 30%);
            font-weight: 500;
            margin-top: 4px; /* small gap from title */
            margin-bottom: 24px; /* reduce bottom spacing */
            line-height: 1.45;
        }
        
        /* Horizontal process steps */
        .process-container {
            padding-bottom: 20px;
            overflow-x: hidden; /* prevent x-axis scrollbar */
        }

        .process-steps {
            display: flex;
            flex-wrap: wrap; /* allow wrapping to avoid horizontal scroll */
            justify-content: center; /* center the steps */
            gap: 1rem;
            padding: 20px 0;
            margin: 0 auto;
            max-width: 1200px;
        }
        
        .process-step {
            flex: 0 1 220px; /* allow shrink/grow and responsive sizing */
            max-width: 350px;
            text-align: center;
            padding: 10px 5px;
            background: var(--surface-color);
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.06);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            border-top: 4px solid var(--secondary-color);
            color: var(--default-color);
        }
        
        .process-step:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 20px rgba(0,0,0,0.15);
        }
        
        .step-number {
            position: absolute;
            top: -18px;
            left: 50%;
            transform: translateX(-50%);
            width: 36px;
            height: 36px;
            background: var(--accent-color);
            color: var(--contrast-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
            box-shadow: 0 6px 18px color-mix(in srgb, var(--accent-color), rgba(0,0,0,0.12));
        }
        
        .process-icon {
            max-width: 100%;
            height: 70px;
            object-fit: contain;
            margin-bottom: 18px;
            filter: none;
        }
        
        .process-step h4 {
            font-size: 1.1rem;
            font-weight: bold;
            margin-bottom: 12px;
            color: var(--secondary-color);

        }
        
        .process-step p {
            font-size: 0.9rem;
            line-height: 1.5;
            color: color-mix(in srgb, var(--default-color), transparent 30%);
            margin-bottom: 0;
        }

        .process-icon{
        
            margin-top: 15px;  


        }
        
        .btn-xl {
            padding: 12px 35px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 50px;
            background: var(--accent-color);
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            color: var(--contrast-color);
        }

        .btn-xl:hover {
            background: color-mix(in srgb, var(--accent-color), transparent 10%);
            transform: translateY(-2px);
            box-shadow: 0 8px 22px color-mix(in srgb, var(--accent-color), rgba(0,0,0,0.12));
        }
        
        /* remove horizontal scroll UI and rely on wrapping */
        .process-container { -webkit-overflow-scrolling: touch; }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .process-step {
                width: 260px;
            }
        }
        
        @media (max-width: 768px) {
            .section-padding {
                padding-top: 60px;
                padding-bottom: 60px;
            }
            
            .section-subtitle {
                margin-bottom: 40px;
            }
            
            .process-step {
                width: 240px;
                margin: 0 10px;
            }
            
            .process-icon {
                height: 100px;
            }
        }
        
        @media (max-width: 576px) {
            .process-step {
                width: 220px;
                padding: 20px 15px;
            }
            
            .process-step h4 {
                font-size: 1rem;
            }
            
            .process-step p {
                font-size: 0.85rem;
            }
            
            .btn-xl {
                padding: 10px 25px;
                font-size: 1rem;
            }
        }
        
        /* Animation for step appearance */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .process-step {
            animation: fadeInUp 0.5s ease forwards;
        }
        
        .process-step:nth-child(1) { animation-delay: 0.1s; }
        .process-step:nth-child(2) { animation-delay: 0.2s; }
        .process-step:nth-child(3) { animation-delay: 0.3s; }
        .process-step:nth-child(4) { animation-delay: 0.4s; }
        .process-step:nth-child(5) { animation-delay: 0.5s; }
        
        /* Section header styling */
        .section-header {
            text-align: center;
            margin-bottom: 5px;
        }
        
        .section-header h2:after {
            content: '';
            display: block;
            width: 80px;
            height: 3px;
            background: var(--primary-color);
            border-radius: 2px;
        }
    </style>
    <!-- Spine Specialist Section -->
    <section class="section-padding bg-light section">
        <div class="container" data-aos="fade-up" data-aos-delay="200">
            <div class="section-header">
                <h2 class="section-title">Seeing a Spine Specialist in Gaborone</h2>
                <h3 class="section-subtitle">What to expect when you visit<br>Spinal Rehabilitation Center</h3>
            </div>
            
            <!-- Horizontal Process Steps -->
            <div class="process-container">
                <div class="process-steps">
                    <!-- Step 1 -->
                    <div class="process-step">
                        <span class="step-number">1</span>
                        <img src="https://spineandnerveghana.com/wp-content/uploads/2023/06/untitled_design_17.png" alt="Schedule Consultation" class="process-icon">
                        <h4>Schedule Consultation</h4>
                        <p>Fill out a form today to schedule a consultation with our Doctors. Don't wait.</p>
                    </div>
                    
                    <!-- Step 2 -->
                    <div class="process-step">
                        <span class="step-number">2</span>
                        <img src="https://spineandnerveghana.com/wp-content/uploads/2023/06/bd2c16e745e19ba2291747055bfeca86.png" alt="Consultation" class="process-icon">
                        <h4>Initial Consultation</h4>
                        <p>At your consultation, the doctor will take a thorough history and decide if you are a candidate for our treatment.</p>
                    </div>
                    
                    <!-- Step 3 -->
                    <div class="process-step">
                        <span class="step-number">3</span>
                        <img src="https://spineandnerveghana.com/wp-content/uploads/2023/06/untitled_design_18.png" alt="Examination" class="process-icon">
                        <h4>Examination & Diagnosis</h4>
                        <p>After a thorough examination and professional imaging, we make an official diagnosis.</p>
                    </div>
                    
                    <!-- Step 4 -->
                    <div class="process-step">
                        <span class="step-number">4</span>
                        <img src="https://spineandnerveghana.com/wp-content/uploads/2023/06/healthcare-treatment-plan-icon.png" alt="Treatment Plan" class="process-icon">
                        <h4>Treatment Plan</h4>
                        <p>Your individualized treatment plan is designed to treat your pain at the source, and provide lasting relief.</p>
                    </div>
                    
                    <!-- Step 5 -->
                    <div class="process-step">
                        <span class="step-number">5</span>
                        <img src="https://spineandnerveghana.com/wp-content/uploads/2023/06/img_554365_1.png" alt="Recovery" class="process-icon">
                        <h4>Recovery & Results</h4>
                        <p>You've taken your life back, avoided medications and surgeries. You're "shocked" you feel this good.</p>
                    </div>
                </div>
            </div>
            
            <!-- CTA Button -->
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <a href="/book-appointment/" class="btn btn-primary btn-xl">
                        <i class="fas fa-calendar-check me-2"></i>Book Your Appointment
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Add some interactive functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Add click event to process steps
            const processSteps = document.querySelectorAll('.process-step');
            
            processSteps.forEach(step => {
                step.addEventListener('click', function() {
                    // Remove active class from all steps
                    processSteps.forEach(s => s.classList.remove('active'));
                    
                    // Add active class to clicked step
                    this.classList.add('active');
                });
            });
            
            // No auto horizontal scrolling: steps are centered and wrap responsively
        });
    </script>