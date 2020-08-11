// Validation errors messages for Parsley
// Load this after Parsley

Parsley.addMessages('uz', {
  defaultMessage: "Noto'g'ri qiymat.",
  type: {
    email:        "Elektron pochtangizni kiriting.",
    url:          "URL manzilini kiriting.",
    number:       "Raqamni kiriting.",
    integer:      "Butun sonni kiriting.",
    digits:       "Faqat raqamlarni kiriting.",
    alphanum:     "Harf-raqamli qiymartni kiriting."
  },
  notblank:       "Ushbu qiymat bo'sh bo'lmasligi kerak.",
  required:       "Majburiy maydon.",
  pattern:        "Ushbu qiymat yaroqsiz.",
  min:            "Ushbu qiymat kamida %s bo'lishi kerak.",
  max:            "Ushbu qiymat %s dan oshmasligi kerak.",
  range:          "Ushbu qiymat %s dan %s gacha bo'lishi kerak.",
  minlength:      "Ushbu qiymat kamida %s ta belgidan iborat bo'lishi kerak.",
  maxlength:      "Ushbu qiymat %s ta belgidan oshmasligi kerak.",
  length:         "Ushbu qiymat %s dan %s tagacha belgi bo'lishi kerak.",
  mincheck:       "Kamida %s ta qiymatni tanlang.",
  maxcheck:       "%s tagacha qiymatlarni tanlang.",
  check:          "%s dan %s gacha bo'lgan qiymatlarni tanlang.",
  equalto:        "Bu qiymat mos kelishi kerak."
});

Parsley.setLocale('uz');
