<x-app-layout :assets="$assets ?? []">
<div id="faqAccordion" class="container-fluid">
   <div class="row">
         <div class="col-lg-12">
            <div class="iq-accordion career-style faq-style">
               <div class="card iq-accordion-block">
                     <div class="active-faq clearfix" id="headingOne">
                        <div class="container-fluid">
                           <div class="row">
                                 <div class="col-sm-12">
                                    <a role="contentinfo" class="accordion-title" data-bs-toggle="collapse"
                                       data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                       <h6>Acceptance of Terms</h6>
                                    </a>
                                 </div>
                           </div>
                        </div>
                     </div>
                     <div class="accordion-details collapse show" id="collapseOne" aria-labelledby="headingOne"
                        data-parent="#faqAccordion">
                        <p class="mb-0">By accessing and using this website, you agree to be bound by these Terms of
                            Use. If you do not agree with any part of these terms, please do not use this
                            website.</p>
                     </div>
               </div>
               <div class="card iq-accordion-block">
                     <div class="active-faq clearfix" id="headingTwo">
                        <div class="container-fluid">
                           <div class="row">
                                 <div class="col-sm-12"><a role="contentinfo" class="accordion-title collapsed"
                                       data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                       aria-controls="collapseTwo"><h6>Use of the Website</h6> </a></div>
                           </div>
                        </div>
                     </div>
                     <div class="accordion-details collapse" id="collapseTwo" aria-labelledby="headingTwo"
                        data-parent="#faqAccordion">
                        <p class="mb-0">You agree to use this website only for lawful purposes and in a manner that
                            does not infringe the rights of, or restrict or inhibit the use of this website by, any
                            third party. Posting abusive, defamatory, or unlawful content through the comment or
                            contact forms is prohibited.
                        </p>
                     </div>
               </div>
               <div class="card iq-accordion-block ">
                     <div class="active-faq clearfix" id="headingThree">
                        <div class="container-fluid">
                           <div class="row">
                                 <div class="col-sm-12"><a role="contentinfo" class="accordion-title collapsed"
                                       data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                       aria-controls="collapseThree"><h6>Intellectual Property</h6> </a>
                                 </div>
                           </div>
                        </div>
                     </div>
                     <div class="accordion-details collapse" id="collapseThree" aria-labelledby="headingThree"
                        data-parent="#faqAccordion">
                        <p class="mb-0">Unless otherwise stated, all content on this website, including text,
                            images, portfolio work, and blog posts, is the property of the site owner and is
                            protected by copyright law. You may not reproduce or redistribute this content without
                            prior written permission.
                        </p>
                     </div>
               </div>
               <div class="card iq-accordion-block ">
                     <div class="active-faq clearfix" id="headingFour">
                        <div class="container-fluid">
                           <div class="row">
                                 <div class="col-sm-12"><a role="contentinfo" class="accordion-title collapsed"
                                       data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                       aria-controls="collapseFour"><h6>User Content</h6> </a>
                                 </div>
                           </div>
                        </div>
                     </div>
                     <div class="accordion-details collapse" id="collapseFour" aria-labelledby="headingFour"
                        data-parent="#faqAccordion">
                        <p class="mb-0">If you submit comments or messages through this website, you remain
                            responsible for that content. We reserve the right to remove or moderate any submitted
                            content at our discretion, including comments awaiting approval.
                        </p>
                     </div>
               </div>
               <div class="card iq-accordion-block">
                     <div class="active-faq clearfix" id="headingFive">
                        <div class="container-fluid">
                           <div class="row">
                                 <div class="col-sm-12"><a role="contentinfo" class="accordion-title collapsed"
                                       data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                                       aria-controls="collapseFive"><h6>Disclaimer &amp; Limitation of Liability</h6> </a></div>
                           </div>
                        </div>
                     </div>
                     <div class="accordion-details collapse" id="collapseFive" aria-labelledby="headingFive"
                        data-parent="#faqAccordion">
                        <p class="mb-0">This website and its content are provided "as is" without warranties of any
                            kind. We are not liable for any damages arising from your use of, or inability to use,
                            this website.
                        </p>
                     </div>
               </div>
               <div class="card iq-accordion-block">
                     <div class="active-faq clearfix" id="headingSix">
                        <div class="container-fluid">
                           <div class="row">
                                 <div class="col-sm-12"><a role="contentinfo" class="accordion-title collapsed"
                                       data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false"
                                       aria-controls="collapseSix"><h6>Changes to These Terms</h6> </a>
                                 </div>
                           </div>
                        </div>
                     </div>
                     <div class="accordion-details collapse" id="collapseSix" aria-labelledby="headingSix"
                        data-parent="#faqAccordion">
                        <p class="mb-0">We may revise these Terms of Use at any time. Continued use of the website
                            after any changes constitutes your acceptance of the updated terms.
                        </p>
                     </div>
               </div>
            </div>
         </div>
   </div>
</div>
</x-app-layout>
