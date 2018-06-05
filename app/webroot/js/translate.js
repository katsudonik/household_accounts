$(function() {
  var t = {
	List: {
      jp: "一覧",
      en: "List"
    },
    New: {
      jp: "新規登録",
      en: "New"
    },
    Purchase_History: {
        jp: "購入履歴",
        en: "Purchase History"
    },
    Items: {
        jp: "項目",
        en: "Items"
    },
    Budgets: {
        jp: "予算",
        en: "Budgets"
    },
    Aggregates: {
        jp: "集計",
        en: "Aggregates"
    },
  };

  var _t = $('body').translate({lang: "jp", t: t});
  var str = _t.g("translate");
  console.log(str);

  $(".lang_selector").click(function(ev) {
    var lang = $(this).attr("data-value");
    _t.lang(lang);

    console.log(lang);
    ev.preventDefault();
  });
});