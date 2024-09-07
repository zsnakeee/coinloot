@extends('layouts.landing')
@section('title', 'Faq')

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
                    <h3 style="color: #ffffff; text-align:center">Privacy Policy</h3>
                </div>
            </div>

        </div>
        <div class="container">
            <div class="col-xl-12">
                <div class="terms_condition-content">
                    <div class="terms_condition-text">
                        <h3>Your privacy is important to us: </h3>
                        <p>Therefore, we guarantee that:</p>
                        <ul>
                            <li>
                                <i class="fa fa-circle"></i>
                                <p>We do not rent or sell your personal information to anyone.</p>
                            </li>
                            <li>
                                <i class="fa fa-circle"></i>
                                <p>Any personal information you provide will be secured by us.</p>
                            </li>
                            <li>
                                <i class="fa fa-circle"></i>
                                <p>You will be able to erase all the data we have stored on you at any given
                                    time.
                                    To request data termination, please contact our customer support.</p>
                            </li>
                        </ul>

                        <p>{{ config('app.name') }} GmbH, a German limited liability company (together with any
                            affiliates,
                            “we“, “us“, and “our” and the “Company”) owns and operates one or more websites, mobile
                            apps,
                            and interactive services, under the brand {{ config('app.name') }}.com or associated brands
                            (collectively, the {{ config('app.name') }} Site“). For the purposes of the U.K. Data
                            Protection
                            Act 1998 and the EU General Data Privacy Regulation (GDPR), we are the data controller. This
                            Privacy and Cookies Policy (“Privacy Policy”) applies to the {{ config('app.name') }} Site
                            and
                            to
                            all of the features, mobile applications, emails, online services and other functionalities
                            (collectively, the “Features“) available via or related to the {{ config('app.name') }}
                            Site,
                            whether accessed via a computer, mobile device, or otherwise (collectively, the
                            “{{ config('app.name') }} Site and Features“). This Privacy Policy may also apply to future
                            websites, mobile apps, and interactive services operated by the Company, whether or not
                            associated with the {{ config('app.name') }} brand. We are committed to protecting your
                            privacy
                            online. We appreciate that you do not want your personal information distributed
                            indiscriminately and here we explain how we collect information, what we do with it and what
                            controls you have. By using the {{ config('app.name') }} Site and Features, you consent to
                            the
                            collection and use of information in accordance with this Privacy Policy. We reserve the
                            right
                            to change this Privacy Policy from time to time by changing it on
                            the {{ config('app.name') }}
                            Site.</p>
                    </div>


                    <div class="terms_condition-text">
                        <h3>Cookies and other technologies: </h3>
                        <p>When you interact with the {{ config('app.name') }} Site and Features, we try to make that
                            experience simple and meaningful. When you visit the {{ config('app.name') }} Site, a web
                            server
                            sends a cookie or other similar technology to your computer or mobile device (as the case
                            may
                            be). Cookies are small pieces of information which are issued to your computer or mobile
                            device
                            when you visit a website or access or use a mobile application and which store and sometimes
                            track information. Some cookies we use may last only for the duration of your web or
                            application
                            session and expire when you close your browser or exit the {{ config('app.name') }} Site.
                            Other
                            cookies are used to remember you when you return to the {{ config('app.name') }} Site and
                            will
                            last
                            for longer. The cookies and/or other similar technologies we use collect a variety of
                            relevant
                            information, such as the type of internet browser or mobile device you use, any website from
                            which you have come to the {{ config('app.name') }} Site, your IP address and/or the
                            operating
                            system of your computer or mobile device. We use cookies and/or other similar technologies,
                            such
                            as tracking GIFs, web beacons, pixel codes and in-app IDs, either alone or in combination
                            with
                            each other to create a unique device ID and to:
                            remember that you have visited us before. This means we can identify the number of unique
                            visitors we receive. This allows us to make sure we have enough capacity for the number of
                            users
                            that we get; customise elements of the promotional layout and/or content of the pages of
                            the {{ config('app.name') }} Site; collect anonymous statistical information about how you
                            use
                            the {{ config('app.name') }} Site and Features (including how long you spend on
                            the {{ config('app.name') }} Site) and where you have come to the {{ config('app.name') }}
                            Site
                            from,
                            so that we can improve the {{ config('app.name') }} Site and learn which parts of
                            the {{ config('app.name') }} Site are most popular with users; and gather information about
                            the
                            pages on the {{ config('app.name') }} Site and Features, and also other information about
                            other
                            websites that you visit, so as to place you in a “market segment”. This information is
                            collected
                            by reference to the IP address that you are using and/or your unique user ID, and includes
                            information about the county and city you are in, together with the name of your internet
                            service provider. This information is then used to place interest-based advertisements and
                            content on the {{ config('app.name') }} Site which it is believed will be relevant to your
                            market
                            segment. For more information about this type of interest based advertising, and about how
                            to
                            turn this feature off please visit http://www.youronlinechoices.com/uk/. Some of the cookies
                            used by the {{ config('app.name') }} Site are set by us, and some are set by third parties
                            who
                            are
                            delivering services or operating features on our behalf. Most web and mobile device browsers
                            automatically accept cookies but, if you prefer, you can change your browser to prevent that
                            or
                            to notify you each time a cookie is set. You can also learn more about cookies by visiting
                            www.allaboutcookies.org which includes additional useful information on cookies and how to
                            block
                            cookies using different types of browser or mobile device. Please note, however, that by
                            blocking or deleting cookies used on the {{ config('app.name') }} Site, you may not be able
                            to
                            take
                            full advantage of the {{ config('app.name') }} Site and Features including the tracking of
                            data
                            required for Promotions and Rewards Programs.</p>
                    </div>

                    <div class="terms_condition-text">
                        <h3>Third-party services: </h3>
                        <p>We use third-party services in order to operate our website. Please note that these
                            services may contain links to third-party apps, websites or services that are not
                            operated by us. We make no representation or warranties with regard to and are not
                            responsible for the content, functionality, legality, security, accuracy, or other
                            aspects of such third-party apps, websites or services. Note that, when accessing
                            and/or
                            using these third-party services, their own privacy policy may apply.</p>
                    </div>

                    <div class="terms_condition-text">
                        <h3>Your rights: </h3>
                        You have a legal right under the U.K. Data Protection Act 1998 and/or and the EU General Data
                        Privacy Regulation (GDPR) to a copy of all the personal information about you held by us. On
                        request, we will provide you with a copy of this information. You also have a right to correct
                        any
                        errors in that information. You also have the right to delete that information, but in that case
                        we
                        may necessarily have to close your account and your participation in any of our Rewards
                        Programs, as
                        we would be unable to continue to offer you our Services.
                    </div>


                    <div class="terms_condition-text mb-0 pb-4">
                        <h3>Contact us: </h3>
                        If you have any questions or concerns regarding these Terms or your use of
                        the {{ config('app.name') }}
                        Site and Features or our Services, please contact us by using the “Contact Us”, “Contact Member
                        Services” or similar contact link in the footer of the {{ config('app.name') }} Site,
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

