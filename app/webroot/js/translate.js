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
    Display_Month: {
        jp: "表示月",
        en: "Display Month"
    },
    Purchase_History: {
        jp: "購入履歴",
        en: "Purchase History"
    },
    Purchase_Histories: {
        jp: "購入履歴",
        en: "Purchase Histories"
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
    Edit: {
        jp: "編集",
        en: "Edit"
    },
    Cancel: {
        jp: "キャンセル",
        en: "Cancel"
    },
    Submit: {
        jp: "保存",
        en: "Submit"
    },
    Delete: {
        jp: "削除",
        en: "Delete"
    },
    item_name: {
        jp: "項目名",
        en: "item_name"
    },
    purchase_date: {
        jp: "購入日",
        en: "purchase_date"
    },
    price: {
        jp: "金額",
        en: "price"
    },
    memo: {
        jp: "備考",
        en: "memo"
    },
    Actions: {
        jp: "操作",
        en: "Actions"
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