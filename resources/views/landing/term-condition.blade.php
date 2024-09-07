@extends('layouts.landing')
@section('title', 'Privacy Policy')

@push('css')
    <style>
        .terms_condition-text {
            margin-bottom: 45px;
        }

        .page_title h3,
        .page_title .h3 {
            font-size: 48px;
            line-height: 60px;
            font-weight: 500;
        }

        li {
            display: flex;
        }

        .terms_condition-text li i {
            line-height: 30px;
            margin-right: 15px;
            font-size: 13px;
            color: #AEAED5;
        }

        .terms_condition-text li p {
            font-size: 15px;
        }

        .terms_condition-text h3 {
            font-size: 24px;
            font-weight: 500;
            margin-bottom: 30px;
            color: #ffffff;
        }
    </style>
@endpush

@section('content')
    <div class="" style="background-color: #161d31; padding-top: 50px">
        <div>
            <div class="page_title-content">
                <div class="col-xl-12">
                    <p style="font-size:24px; text-align:center">Last updated: February 6, 2022</p>
                    <h3 style="color: #ffffff; text-align:center">Terms and Conditions</h3>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col-xl-12">
                <div class="terms_condition-content">
                    <div class="terms_condition-text">
                        <h3>Terms of Service : </h3>
                        <p style="font-size: 15px;">By using {{ config('app.name') }} you agree to and are bound by
                            these
                            Terms and Conditions in
                            their
                            entirety and, without reservation, all applicable laws and regulations, and you
                            agree
                            that you are responsible for compliance with any applicable laws. These Terms of
                            Service
                            govern your use of this website. If you do not agree with any of these terms, you
                            are
                            prohibited from using {{ config('app.name') }}.</p>
                    </div>


                    <div class="terms_condition-text">
                        <h3>Acceptable use : </h3>
                        <ul>
                            <li>
                                <i class="fa fa-circle"></i>
                                <p>You must not use {{ config('app.name') }} in any way that can cause damage to
                                    {{ config('app.name') }} or in any way which is unlawful, illegal, fraudulent or
                                    harmful,
                                    or in connection with any illegal, fraudulent, or harmful activity.</p>
                            </li>
                            <li>
                                <i class="fa fa-circle"></i>
                                <p>You must not use this website to send any sort of commercial communications.
                                </p>
                            </li>
                            <li>
                                <i class="fa fa-circle"></i>
                                <p>You must not use this website for any purposes related to marketing without
                                    the
                                    permission of {{ config('app.name') }}.</p>
                            </li>
                            <li>
                                <i class="fa fa-circle"></i>
                                <p>You must not use this website to publish or distribute any material which
                                    consists of (or is linked to) any spyware, computer virus, Trojan horse,
                                    worm,
                                    keylogger, rootkit, or other malicious software.</p>
                            </li>
                        </ul>
                    </div>


                    <div class="terms_condition-text">
                        <h3>Membership : </h3>
                        <ul>
                            <li>
                                <i class="fa fa-circle"></i>
                                <p>Users must be 18 years old and above or 13 years to 18 years old with
                                    parental
                                    permission. A user between the ages of 13 to 18 certifies that a parent has
                                    given permission before signing up. </p>
                            </li>
                            <li>
                                <i class="fa fa-circle"></i>
                                <p>Users must provide valid and truthful information during all stages. </p>
                            </li>
                            <li>
                                <i class="fa fa-circle"></i>
                                <p>Users must not create more than one account per person, as having multiple
                                    accounts may result in all accounts being suspended and all points forfeited
                                </p>
                            </li>
                            <li>
                                <i class="fa fa-circle"></i>
                                <p>Users must not use a proxy or attempt to mask or reroute their internet
                                    connection. That will result in your all accounts being suspended.</p>
                            </li>
                            <li>
                                <i class="fa fa-circle"></i>
                                <p>Account balance may not be transferred, exchanged, sold, or otherwise change
                                    ownership under any circumstances, except by {{ config('app.name') }}</p>
                            </li>
                            <li>
                                <i class="fa fa-circle"></i>
                                <p>We reserve the right to close your account, and forfeit any points, if you
                                    have
                                    violated our terms of service agreement. </p>
                            </li>
                            <li>
                                <i class="fa fa-circle"></i>
                                <p>We reserve the right to close your account due to inactivity of 9 or more
                                    months.
                                    An inactive account is defined as an account that has not earned any gems
                                    for 9
                                    or more months</p>
                            </li>
                        </ul>
                    </div>

                    <div class="terms_condition-text">
                        <h3>Indemnity : </h3>
                        <p>You hereby indemnify {{ config('app.name') }} and undertake to keep {{ config('app.name') }}
                            indemnified
                            against any losses, damages, costs, liabilities, and/or expenses (including without
                            limitation legal expenses) and any amounts paid by {{ config('app.name') }} to a third party
                            in
                            settlement of a claim or dispute on the advice of {{ config('app.name') }}’s legal advisers)
                            incurred or suffered by {{ config('app.name') }} arising out of any breach by you of any
                            provision
                            of these terms and conditions, or arising out of any claim that you have breachedany
                            provision of these terms and conditions.</p>
                    </div>

                    <div class="terms_condition-text">
                        <h3>No warranties : </h3>
                        <p>{{ config('app.name') }} is provided “as is” without any representations or warranties.
                            {{ config('app.name') }}
                            makes no representations or warranties in relation to this website or the
                            information
                            and materials provided on this website.</p>
                        <p>{{ config('app.name') }} does not warrant that:</p>

                        <ul>
                            <li>
                                <i class="fa fa-circle"></i>
                                <p>The website will be constantly available, or available at all moving forward.
                                </p>
                            </li>
                            <li>
                                <i class="fa fa-circle"></i>
                                <p>The information on this website is complete, true, or non-misleading.</p>
                            </li>
                        </ul>
                    </div>

                    <div class="terms_condition-text">
                        <h3>Privacy : </h3>
                        <p>For details about our privacy policy, please refer to the privacy policy section.</p>
                    </div>

                    <div class="terms_condition-text">
                        <h3>Unenforceable provisions : </h3>
                        <p>If any provision of this website disclaimer is, or is found to be, unenforceable
                            under
                            applicable law, that will not affect the enforceability of the other provisions of
                            this
                            website disclaimer.</p>
                    </div>

                    <div class="terms_condition-text">
                        <h3>Links : </h3>
                        <p>Responsibility for the content of external links (to web pages of third parties) lies
                            solely with the operators of the linked pages.</p>
                    </div>

                    <div class="terms_condition-text">
                        <h3>Modifications: </h3>
                        <p>{{ config('app.name') }} may revise these terms of use for its website at any time without
                            notice.
                            By using this web site you are agreeing to be bound by the then current version of
                            these
                            terms of service.</p>
                    </div>

                    <div class="terms_condition-text mb-0 pb-4">
                        <h3>Breaches of these terms and conditions: </h3>
                        <ul>
                            <li>
                                <i class="fa fa-circle"></i>
                                <p>{{ config('app.name') }} reserves the rights under these terms and conditions to take
                                    action if you breach these terms and conditions in any way. </p>
                            </li>
                            <li>
                                <i class="fa fa-circle"></i>
                                <p>{{ config('app.name') }} may take such action as seems appropriate to deal with the
                                    breach,
                                    including suspending your access to the website, suspending your earnings
                                    made
                                    trough {{ config('app.name') }},prohibiting you from accessing the website, or
                                    bringing
                                    court proceedings against you.</p>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

