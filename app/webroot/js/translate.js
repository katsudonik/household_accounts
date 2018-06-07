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
    Year: {
        jp: "年",
        en: "Year"
    },
    Month: {
        jp: "月",
        en: "Month"
    },
    Display_Year: {
        jp: "表示年",
        en: "Display Year"
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
    Item: {
        jp: "項目",
        en: "Item"
    },
    Budgets: {
        jp: "予算",
        en: "Budgets"
    },
    Aggregation: {
        jp: "集計",
        en: "Aggregation"
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
    item_id: {
        jp: "項目",
        en: "item_id"
    },
    item_name: {
        jp: "項目",
        en: "item_name"
    },
    name: {
        jp: "項目",
        en: "name"
    },
    Name: {
        jp: "項目",
        en: "Name"
    },
    purchase_date: {
        jp: "購入日",
        en: "purchase_date"
    },
    Price: {
        jp: "金額",
        en: "Price"
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

    Budget_Price: {
        jp: "予算",
        en: "Budget_Price"
    },
    remain: {
        jp: "残額",
        en: "remain"
    },
    chart: {
        jp: "グラフ",
        en: "chart"
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