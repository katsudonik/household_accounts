$(function() {
  $('label').addClass('trn');

  var t = {
	Japanese: {
      jp: "日本語",
      en: "Japanese"
    },
    English: {
	      jp: "英語",
	      en: "English"
	},
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
    Purchase_Histories: {
        jp: "購入履歴",
        en: "Purchase Histories"
    },
    Income_Histories: {
        jp: "収入履歴",
        en: "Income Histories"
    },
    Income_Schedules: {
        jp: "収入予定",
        en: "Income Schedules"
    },
    Items: {
        jp: "項目",
        en: "Items"
    },
    Item: {
        jp: "項目",
        en: "Item"
    },
    store_name: {
        jp: "店名",
        en: "store name"
    },
    purchases: {
        jp: "商品",
        en: "purchases"
    },
    Purchase_Schedules: {
        jp: "購入予定",
        en: "Purchase_Schedules"
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

    Schedule_Price: {
        jp: "予算",
        en: "Schedule_Price"
    },
    Remain: {
        jp: "残高",
        en: "remain"
    },
    remain: {
        jp: "残高",
        en: "remain"
    },
    chart: {
        jp: "グラフ",
        en: "chart"
    },
    type: {
        jp: "種別",
        en: "type"
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