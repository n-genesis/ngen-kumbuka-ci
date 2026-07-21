<?= $this->extend('layouts/main'); ?>

<?= $this->section('main'); ?>

<!-- Wrapper Start -->
<div class="wrapper">

    <!-- Navbar Mobile-->
    <?= $this->include('partials/iq_top_navbar') ?>
    <!-- END Navbar -->

    <!-- Main Sidebar -->
    <?= $this->include('partials/iq_sidebar') ?>
    <!-- END Main Sidebar-->

    <div class="content-page">

        <div class="container-fluid note-details">

            <div class="desktop-header mb-3">
                <!-- Top Left Nav -->
                <div class="card card-block topnav-left mb-0">
                    <div class="card-body d-flex align-items-center">
                        <div class="d-flex justify-content-between">
                            <h4 class="text-capitalize">Terms Of Use</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="alert bg-white alert-primary" role="alert">
                <div class="iq-alert-text">
                    <p>Welcome to Kumbuka (the "Application"). This website is
                        a live portfolio project created and owned by Adrian Garber / N-Gen Design
                        ("we," "us," or "our"). It is designed strictly to demonstrate web development
                        proficiency, backend architecture, and design implementations using the CodeIgniter
                        framework.
                    </p>
                    <p>
                        By accessing or using this Application, you acknowledge that you have read,
                        understood, and agreed to be bound by these Terms and Conditions. If you do not
                        agree, please discontinue use of the site immediately.
                    </p>
                </div>
            </div>

        </div>

        <!-- Terms Of Service -->
        <main id="faqAccordion" class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="iq-accordion career-style faq-style">
                        <div class="card iq-accordion-block">
                            <div class="active-faq clearfix" id="headingOne">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a role="contentinfo" class="accordion-title" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                <span>1. Intellectual Property & Ownership</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-details collapse show" id="collapseOne" aria-labelledby="headingOne"
                                data-parent="#faqAccordion">
                                <p class="mb-0">
                                </p>
                                <ul>
                                    <li>
                                        <b>Exclusive Rights:</b> The Application, its entire source code, database
                                        architecture, visual interface, graphics, branding, logos, and underlying
                                        business concept are the sole and exclusive property of Adrian Garber / N-Gen
                                        Design.
                                    </li>
                                    <li>
                                        <b>Usage Restrictions:</b> This website is a public demonstration. You are
                                        strictly prohibited from copying, reproducing, modifying, distributing,
                                        reverse-engineering, or commercializing the source code or core business model
                                        of this application without explicit written consent.
                                    </li>
                                    <li>
                                        <b>Evaluation Only:</b> Access to the source code via public repositories (such
                                        as GitHub) is granted solely for educational review and hiring evaluation
                                        purposes.
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card iq-accordion-block">
                            <div class="active-faq clearfix" id="headingTwo">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-12"><a role="contentinfo" class="accordion-title collapsed"
                                                data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                                aria-controls="collapseTwo"><span>2. Acceptable Use & Live Demo
                                                    Behavior</span> </a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-details collapse" id="collapseTwo" aria-labelledby="headingTwo"
                                data-parent="#faqAccordion">
                                <ul>
                                    <li>
                                        <b>Mock Data Requirement:</b> This is a demonstration application. You agree to
                                        interact with all forms, input fields, and user account systems using mock or
                                        dummy data only. Do not submit real personal or sensitive information.
                                    </li>
                                    <li>
                                        <b>Prohibited Conduct:</b> You agree not to attempt to disrupt, hack, overload,
                                        or compromise the security of the Application, its servers, or its underlying
                                        CodeIgniter framework infrastructure.
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card iq-accordion-block ">
                            <div class="active-faq clearfix" id="headingThree">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-12"><a role="contentinfo" class="accordion-title collapsed"
                                                data-toggle="collapse" data-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree"><span>3. Disclaimers
                                                    and Limitation of Liability</span> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-details collapse" id="collapseThree" aria-labelledby="headingThree"
                                data-parent="#faqAccordion">
                                <ul>
                                    <li>
                                        <b>Provided "As-Is":</b> This Application is provided on an "as-is" and
                                        "as-available" basis for display purposes. We make no guarantees regarding
                                        uptime, functionality, or data preservation.
                                    </li>
                                    <li>
                                        <b>No Client Contract:</b> Viewing or interacting with this portfolio
                                        application does not constitute a formal developer-client relationship or a
                                        contract for professional web development services.
                                    </li>
                                    <li>
                                        <b>Limitation of Liability:</b> In no event shall Adrian Garber / N-Gen Design
                                        be liable for any direct, indirect, incidental, or consequential damages
                                        resulting from your use or inability to use this demonstration site.
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card iq-accordion-block ">
                            <div class="active-faq clearfix" id="headingFour">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-12"><a role="contentinfo" class="accordion-title collapsed"
                                                data-toggle="collapse" data-target="#collapseFour" aria-expanded="false"
                                                aria-controls="collapseFour"><span>4. Reservation of Rights </span> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-details collapse" id="collapseFour" aria-labelledby="headingFour"
                                data-parent="#faqAccordion">
                                <p class="mb-0">We reserve the right, at our sole discretion and without prior notice, to:
                                </p>
                                <ul>
                                    <li>
                                        Periodically wipe, clear, or reset the application database.
                                    </li>
                                    <li>
                                        Terminate, suspend, or delete dummy user accounts created for testing.
                                    </li>
                                    <li>
                                        Modify the source code, layout, or completely take down the live application.
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card iq-accordion-block">
                            <div class="active-faq clearfix" id="headingFive">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-12"><a role="contentinfo" class="accordion-title collapsed"
                                                data-toggle="collapse" data-target="#collapseFive" aria-expanded="false"
                                                aria-controls="collapseFive"><span> 5. Governing Law </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-details collapse" id="collapseFive" aria-labelledby="headingFive"
                                data-parent="#faqAccordion">
                                <p class="mb-0">These Terms and Conditions are governed by and construed in accordance
                                    with the laws of Tennessee/United States, without regard to its conflict of law
                                    principles.
                                </p>
                            </div>
                        </div>
                        <div class="card iq-accordion-block">
                            <div class="active-faq clearfix" id="headingSix">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-12"><a role="contentinfo" class="accordion-title collapsed"
                                                data-toggle="collapse" data-target="#collapseSix" aria-expanded="false"
                                                aria-controls="collapseSix"><span> 6. Contact Information </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-details collapse" id="collapseSix" aria-labelledby="headingSix"
                                data-parent="#faqAccordion">
                                <p class="mb-0">If you are a prospective client or employer interested in discussing the
                                    architecture of this application, or if you wish to request permission to build upon
                                    this concept, please reach out via our official business contact:
                                </p>
                                <ul>
                                    <li>
                                        <b>Company:</b> N-Gen Design

                                    </li>
                                    <li>
                                        <b>Website:</b> https://ngendesign.com
                                    </li>
                                    <li>
                                        <b>Email:</b> ngendesign@email.com

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>
</div>
<!-- Wrapper End-->

<!-- Include footer tag -->
<?= $this->include('partials/footer') ?>

<!-- END Main -->
<?= $this->endSection(); ?>