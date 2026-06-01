<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GCC Top 100 Companies — Nomination Form</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Georgia', serif;
            background: #f5f0e8;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .page-wrapper { max-width: 860px; margin: 0 auto; }

        /* Language Toggle */
        .lang-toggle {
            display: flex;
            justify-content: flex-end;
            gap: 8px;
            margin-bottom: 12px;
        }
        .lang-btn {
            padding: 6px 18px;
            border: 2px solid #c9a84c;
            border-radius: 20px;
            background: transparent;
            color: #1a1a2e;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            letter-spacing: 0.5px;
        }
        .lang-btn.active { background: #c9a84c; color: #1a1a2e; }
        .lang-btn:hover { background: #c9a84c; color: #1a1a2e; }

        /* Header */
        .header {
            background: #1a1a2e;
            color: white;
            padding: 28px 36px;
            border-radius: 10px 10px 0 0;
            text-align: center;
            border-bottom: 4px solid #c9a84c;
        }
        .header .org-label { font-size: 11px; letter-spacing: 3px; text-transform: uppercase; color: #c9a84c; margin-bottom: 10px; }
        .header h1 { font-size: 32px; font-weight: 700; letter-spacing: 2px; color: white; line-height: 1.2; }
        .header h1 span { color: #c9a84c; }
        .header .tagline { font-size: 13px; color: #aaa; margin-top: 6px; letter-spacing: 1px; }
        .cities { font-size: 11px; color: #c9a84c; letter-spacing: 2px; margin-top: 10px; }

        /* Bilingual header row */
        .bilingual-header {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }
        .sub-header-en, .sub-header-ar {
            background: #c9a84c;
            color: #1a1a2e;
            text-align: center;
            padding: 12px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 1px;
        }
        .sub-header-ar { font-family: 'Arial', sans-serif; direction: rtl; border-left: 1px solid #b8943e; }

        /* Info band */
        .info-band {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }
        .info-en, .info-ar {
            background: #1a1a2e;
            color: #ddd;
            font-size: 12.5px;
            line-height: 1.8;
            padding: 20px 24px;
        }
        .info-ar {
            font-family: 'Arial', sans-serif;
            direction: rtl;
            text-align: right;
            border-left: 1px solid #2e2e4e;
        }
        .info-en { border-right: 1px solid #2e2e4e; }

        /* Form card */
        .form-card {
            background: white;
            padding: 36px;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
        }

        .form-title-wrap {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            border-bottom: 2px solid #c9a84c;
            padding-bottom: 10px;
            margin-bottom: 8px;
        }
        .form-title-en { font-size: 17px; font-weight: 700; color: #1a1a2e; }
        .form-title-ar { font-size: 17px; font-weight: 700; color: #1a1a2e; font-family: 'Arial', sans-serif; }

        .form-subtitle {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: #777;
            margin-bottom: 28px;
            margin-top: 8px;
        }
        .form-subtitle span:last-child { font-family: 'Arial', sans-serif; direction: rtl; }

        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }

        /* Each field split EN | AR */
        .field { display: flex; flex-direction: column; }
        .field.full { grid-column: 1 / -1; }

        .label-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 6px;
        }
        .label-en {
            font-size: 11px;
            font-weight: 700;
            color: #1a1a2e;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .label-ar {
            font-size: 12px;
            font-weight: 700;
            color: #1a1a2e;
            font-family: 'Arial', sans-serif;
        }
        .req { color: #c9a84c; margin-left: 2px; }
        .opt { color: #aaa; font-size: 10px; font-weight: 400; }

        input, select, textarea {
            padding: 11px 14px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 13.5px;
            font-family: inherit;
            color: #333;
            background: #fafafa;
            transition: border 0.2s;
            width: 100%;
        }
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #c9a84c;
            background: white;
            box-shadow: 0 0 0 3px rgba(201,168,76,0.1);
        }
        textarea { resize: vertical; min-height: 90px; }

        .error { color: #c0392b; font-size: 11.5px; margin-top: 5px; }

        .success-box {
            background: #eafaf1;
            border: 1px solid #2ecc71;
            color: #1a6b3a;
            padding: 16px 20px;
            border-radius: 8px;
            margin-bottom: 28px;
            font-size: 14px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .success-ar { font-family: 'Arial', sans-serif; direction: rtl; font-size: 13px; }

        .btn-wrap { grid-column: 1 / -1; margin-top: 8px; }
        button[type="submit"] {
            width: 100%;
            padding: 14px;
            background: #1a1a2e;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            letter-spacing: 1px;
            transition: background 0.2s;
        }
        button[type="submit"]:hover { background: #c9a84c; color: #1a1a2e; }

        .btn-text-ar { font-family: 'Arial', sans-serif; display: none; }

        .footer-note {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: #999;
            margin-top: 20px;
            flex-wrap: wrap;
            gap: 8px;
        }
        .footer-note a { color: #c9a84c; text-decoration: none; }
        .footer-ar { font-family: 'Arial', sans-serif; direction: rtl; }

        /* RTL mode */
        body.rtl input,
        body.rtl select,
        body.rtl textarea {
            direction: rtl;
            text-align: right;
        }

        @media (max-width: 600px) {
            .form-grid { grid-template-columns: 1fr; }
            .bilingual-header { grid-template-columns: 1fr; }
            .info-band { grid-template-columns: 1fr; }
            .header h1 { font-size: 22px; }
            .form-card { padding: 24px 16px; }
        }
    </style>
</head>
<body>
<div class="page-wrapper">

    <!-- Language Toggle -->
    <div class="lang-toggle">
        <button class="lang-btn active" onclick="setLang('en')">English</button>
        <button class="lang-btn" onclick="setLang('ar')">العربية</button>
    </div>

    <!-- Header -->
    <div class="header">
        <p class="org-label">
            <span class="en-text">Project Organiser — Since 1985</span>
            <span class="ar-text" style="display:none;font-family:'Arial',sans-serif;">مدير المشروع — منذ 1985</span>
        </p>
        <h1>BUSINESS <span>&</span> FINANCE</h1>
        <p class="tagline">GROUP</p>
        <p class="cities">DUBAI دبي — RIYADH الرياض — LONDON لندن — WASHINGTON واشنطن</p>
    </div>

    <!-- Bilingual Sub Header -->
    <div class="bilingual-header">
        <div class="sub-header-en">GCC TOP 100 COMPANIES — DAVOS GULF 2024/2025</div>
        <div class="sub-header-ar">مشروع أكبر 100 شركة خليجية — دافوس الخليج 2024/2025</div>
    </div>

    <!-- Bilingual Info Band -->
    <div class="info-band">
        <div class="info-en">
            Please fill out the nomination form for the <strong style="color:#c9a84c">GCC Top 100 Companies</strong> — Davos Gulf for Wealth Investment, Marketing Opportunities and Direct Visits 24/2025.
            Contact: <strong style="color:#c9a84c">magazine.info@bfg-globals.com</strong>
        </div>
        <div class="info-ar">
            يرجى تعبئة استمارة المعلومات لترشيح منشأتكم ضمن قائمة أكبر <strong style="color:#c9a84c">100 شركة خليجية</strong> — دافوس الخليج لتنمية الثروات وتسويق الفرص التجارية والزيارات الميدانية 2024/2025.
            التواصل: <strong style="color:#c9a84c">magazine.info@bfg-globals.com</strong>
        </div>
    </div>

    <!-- Form -->
    <div class="form-card">

        <div class="form-title-wrap">
            <span class="form-title-en">Nomination Information Form</span>
            <span class="form-title-ar">استمارة معلومات الترشيح</span>
        </div>

        <div class="form-subtitle">
            <span class="en-text">Fields marked <span style="color:#c9a84c">*</span> are required.</span>
            <span class="ar-text" style="font-family:'Arial',sans-serif;direction:rtl;">الحقول المميزة بـ <span style="color:#c9a84c">*</span> إلزامية.</span>
        </div>

        @if(session('success'))
        <div class="success-box">
            <span>✓ {{ session('success') }}</span>
            <span class="success-ar">✓ تم تقديم ترشيحك بنجاح. سنتواصل معك قريباً.</span>
        </div>
        @endif

        <form method="POST" action="/nominate">
            @csrf
            <div class="form-grid">

                <div class="field">
                    <div class="label-row">
                        <span class="label-en">Company Name <span class="req">*</span></span>
                        <span class="label-ar">اسم الشركة <span class="req">*</span></span>
                    </div>
                    <input type="text" name="company_name" value="{{ old('company_name') }}" placeholder="e.g. Al Futtaim Group">
                    @error('company_name') <p class="error">{{ $message }}</p> @enderror
                </div>

                <div class="field">
                    <div class="label-row">
                        <span class="label-en">Industry Sector <span class="opt">(optional)</span></span>
                        <span class="label-ar">القطاع</span>
                    </div>
                    <select name="industry_sector">
                        <option value="">— Select / اختر —</option>
                        <option value="Banking & Finance">Banking & Finance / البنوك والمال</option>
                        <option value="Real Estate">Real Estate / العقارات</option>
                        <option value="Oil & Gas">Oil & Gas / النفط والغاز</option>
                        <option value="Technology">Technology / التكنولوجيا</option>
                        <option value="Healthcare">Healthcare / الرعاية الصحية</option>
                        <option value="Retail & FMCG">Retail & FMCG / التجزئة</option>
                        <option value="Media & Publishing">Media & Publishing / الإعلام</option>
                        <option value="Construction">Construction / البناء والتشييد</option>
                        <option value="Other">Other / أخرى</option>
                    </select>
                </div>

                <div class="field">
                    <div class="label-row">
                        <span class="label-en">Contact Person <span class="req">*</span></span>
                        <span class="label-ar">الشخص المسؤول <span class="req">*</span></span>
                    </div>
                    <input type="text" name="contact_person" value="{{ old('contact_person') }}" placeholder="Full name / الاسم الكامل">
                    @error('contact_person') <p class="error">{{ $message }}</p> @enderror
                </div>

                <div class="field">
                    <div class="label-row">
                        <span class="label-en">Designation <span class="opt">(optional)</span></span>
                        <span class="label-ar">المسمى الوظيفي</span>
                    </div>
                    <input type="text" name="designation" value="{{ old('designation') }}" placeholder="CEO, Director / المدير التنفيذي">
                    @error('designation') <p class="error">{{ $message }}</p> @enderror
                </div>

                <div class="field">
                    <div class="label-row">
                        <span class="label-en">Email Address <span class="req">*</span></span>
                        <span class="label-ar">البريد الإلكتروني <span class="req">*</span></span>
                    </div>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="contact@company.com">
                    @error('email') <p class="error">{{ $message }}</p> @enderror
                </div>

                <div class="field">
                    <div class="label-row">
                        <span class="label-en">Phone Number <span class="opt">(optional)</span></span>
                        <span class="label-ar">رقم الهاتف</span>
                    </div>
                    <input type="text" name="phone" value="{{ old('phone') }}" placeholder="+971 50 000 0000">
                    @error('phone') <p class="error">{{ $message }}</p> @enderror
                </div>

                <div class="field">
                    <div class="label-row">
                        <span class="label-en">Country <span class="req">*</span></span>
                        <span class="label-ar">الدولة <span class="req">*</span></span>
                    </div>
                    <select name="country">
                        <option value="">— Select / اختر —</option>
                        <option value="UAE">UAE / الإمارات</option>
                        <option value="Saudi Arabia">Saudi Arabia / السعودية</option>
                        <option value="Kuwait">Kuwait / الكويت</option>
                        <option value="Qatar">Qatar / قطر</option>
                        <option value="Bahrain">Bahrain / البحرين</option>
                        <option value="Oman">Oman / عُمان</option>
                        <option value="Other">Other / أخرى</option>
                    </select>
                    @error('country') <p class="error">{{ $message }}</p> @enderror
                </div>

                <div class="field">
                    <div class="label-row">
                        <span class="label-en">Website <span class="opt">(optional)</span></span>
                        <span class="label-ar">الموقع الإلكتروني</span>
                    </div>
                    <input type="url" name="website" value="{{ old('website') }}" placeholder="https://www.company.com">
                    @error('website') <p class="error">{{ $message }}</p> @enderror
                </div>

                <div class="field full">
                    <div class="label-row">
                        <span class="label-en">Company Description <span class="opt">(optional)</span></span>
                        <span class="label-ar">نبذة عن الشركة</span>
                    </div>
                    <textarea name="company_description" placeholder="Brief description / نبذة مختصرة عن الشركة وأبرز إنجازاتها...">{{ old('company_description') }}</textarea>
                    @error('company_description') <p class="error">{{ $message }}</p> @enderror
                </div>

                <div class="btn-wrap">
                    <button type="submit">
                        <span class="en-text">SUBMIT NOMINATION</span>
                        <span class="ar-text" style="display:none;font-family:'Arial',sans-serif;">إرسال الترشيح</span>
                    </button>
                </div>

            </div>
        </form>

        <div class="footer-note">
            <span>Enquiries: <a href="mailto:magazine.info@bfg-globals.com">magazine.info@bfg-globals.com</a> | <a href="http://www.bfg-globals.com">www.bfg-globals.com</a></span>
            <span class="footer-ar">للاستفسار: <a href="mailto:magazine.info@bfg-globals.com">magazine.info@bfg-globals.com</a></span>
        </div>
    </div>
</div>

<script>
    function setLang(lang) {
        const enTexts = document.querySelectorAll('.en-text');
        const arTexts = document.querySelectorAll('.ar-text');
        const btns = document.querySelectorAll('.lang-btn');

        if (lang === 'ar') {
            enTexts.forEach(el => el.style.display = 'none');
            arTexts.forEach(el => el.style.display = 'inline');
            document.body.classList.add('rtl');
            btns[0].classList.remove('active');
            btns[1].classList.add('active');
        } else {
            enTexts.forEach(el => el.style.display = 'inline');
            arTexts.forEach(el => el.style.display = 'none');
            document.body.classList.remove('rtl');
            btns[0].classList.add('active');
            btns[1].classList.remove('active');
        }
    }
</script>

</body>
</html>