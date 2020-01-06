const dictionary = {
  en: {
    // messages: {
    //   required: (field, val) => `${field} مطلوب`
    // },
    // attributes:{
    //
    // }
  },
  ar: {
    messages: {
      accepted :(field, val) => `يجب قبول ${field}.`,
      active_url:(field, val) => `${field} لا يُمثّل رابطًا صحيحًا.`,
      after     :(field, val) => `يجب على ${field} أن يكون تاريخًا لاحقًا للتاريخ :date.`,
      after_or_equal   :(field, val)    => `${field} يجب أن يكون تاريخاً لاحقاً أو مطابقاً للتاريخ :date.`,
      alpha     :(field, val) => `يجب أن لا يحتوي ${field} سوى على حروف.`,
      alpha_dash:(field, val) => `يجب أن لا يحتوي ${field} سوى على حروف، أرقام ومطّات.`,
      alpha_num :(field, val) => `يجب أن يحتوي ${field} على حروفٍ وأرقامٍ فقط.`,
      array     :(field, val) => `يجب أن يكون ${field} ًمصفوفة.`,
      before    :(field, val) => `يجب على ${field} أن يكون تاريخًا سابقًا للتاريخ :date.`,
      before_or_equal  :(field, val)    => `${field} يجب أن يكون تاريخا سابقا أو مطابقا للتاريخ :date.`,
      boolean   :(field, val) => `يجب أن تكون قيمة ${field} إما true أو false .`,
      confirmed :(field, val) => `حقل التأكيد غير مُطابق للحقل ${field}.`,
      date      :(field, val) => `${field} ليس تاريخًا صحيحًا.`,
      date_equals   :(field, val)        => `يجب أن يكون ${field} مطابقاً للتاريخ :date.`,
      date_format   :(field, val)        => `لا يتوافق ${field} مع الشكل :format.`,
      different :(field, val) => `يجب أن يكون الحقلان ${field} و :other مُختلفين.`,
      digits    :(field, val) => `يجب أن يحتوي ${field} على :digits رقمًا/أرقام.`,
      digits_between   :(field, val)     => `يجب أن يحتوي ${field} بين :min و :max رقمًا/أرقام .`,
      dimensions:(field, val) => `الـ ${field} يحتوي على أبعاد صورة غير صالحة.`,
      distinct  :(field, val) => `للحقل ${field} قيمة مُكرّرة.`,
      email     :(field, val) => `يجب أن يكون ${field} عنوان بريد إلكتروني صحيح البُنية.`,
      ends_with :(field, val) => `يجب أن ينتهي ${field} بأحد القيم التالية: :values`,
      exists    :(field, val) => `القيمة المحددة ${field} غير موجودة.`,
      file      :(field, val) => `الـ ${field} يجب أن يكون ملفا.`,
      filled    :(field, val) => `${field} إجباري.`,
      image     :(field, val) => `يجب أن يكون ${field} صورةً.`,
      in        :(field, val) => `${field} غير موجود.`,
      in_array  :(field, val) => `${field} غير موجود في :other.`,
      integer   :(field, val) => `يجب أن يكون ${field} عددًا صحيحًا.`,
      ip        :(field, val) => `يجب أن يكون ${field} عنوان IP صحيحًا.`,
      ipv4      :(field, val) => `يجب أن يكون ${field} عنوان IPv4 صحيحًا.`,
      ipv6      :(field, val) => `يجب أن يكون ${field} عنوان IPv6 صحيحًا.`,
      json      :(field, val) => `يجب أن يكون ${field} نصآ من نوع JSON.`,
      mimes     :(field, val) => `يجب أن يكون ملفًا من نوع : :values.`,
      mimetypes :(field, val) => `يجب أن يكون ملفًا من نوع : :values.`,
      not_in    :(field, val) => `${field} موجود.`,
      not_regex :(field, val) => `صيغة ${field} غير صحيحة.`,
      numeric   :(field, val) => `يجب على ${field} أن يكون رقمًا.`,
      present   :(field, val) => `يجب تقديم ${field}.`,
      regex     :(field, val) => `صيغة ${field} .غير صحيحة.`,
      required  :(field, val) => `${field} مطلوب.`,
      required_if     :(field, val)      => `${field} مطلوب في حال ما إذا كان :other يساوي :value.`,
      required_unless   :(field, val)    => `${field} مطلوب في حال ما لم يكن :other يساوي :values.`,
      required_with   :(field, val)      => `${field} مطلوب إذا توفّر :values.`,
      required_with_all:(field, val)     => `${field} مطلوب إذا توفّر :values.`,
      required_without  :(field, val)    => `${field} مطلوب إذا لم يتوفّر :values.`,
      required_without_all:(field, val)  => `${field} مطلوب إذا لم يتوفّر :values.`,
      same      :(field, val) => `يجب أن يتطابق ${field} مع :other.`,
      starts_with :(field, val)  => `يجب أن يبدأ ${field} بأحد القيم التالية: :values`,
      string    :(field, val) => `يجب أن يكون ${field} نصًا.`,
      timezone  :(field, val) => `يجب أن يكون ${field} نطاقًا زمنيًا صحيحًا.`,
      unique    :(field, val) => `قيمة ${field} مُستخدمة من قبل.`,
      uploaded  :(field, val) => `فشل في تحميل الـ ${field}.`,
      url       :(field, val) => `صيغة الرابط ${field} غير صحيحة.`,
      uuid      :(field, val) => `${field} يجب أن يكون بصيغة UUID سليمة.`,
    },
    attributes:{

    }
  },
};

export default dictionary;
