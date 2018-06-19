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
    Aggregation_Year: {
        jp: "年次消費動向",
        en: "Aggregation_Year"
    },
    Aggregation_Month: {
        jp: "月次予算管理",
        en: "Aggregation_Month"
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
    "Schedule Price": {
        jp: "予算",
        en: "Schedule Price"
    },
    "target_date": {
        jp: "対象日",
        en: "target date"
    },
    "target_start_date": {
        jp: "対象期間開始日",
        en: "target_start_date"
    },
    "target_end_date": {
        jp: "対象期間終了日",
        en: "target_end_date"
    },
    "Target Date": {
        jp: "対象日",
        en: "target date"
    },
    "Target Start Date": {
        jp: "対象期間開始日",
        en: "target_start_date"
    },
    "Target End Date": {
        jp: "対象期間終了日",
        en: "target_end_date"
    },
    "schedule_end_date": {
        jp: "予定対象期間終了日（明日～指定日）",
        en: "target_end_date"
    },
    "point": {
        jp: "特定日",
        en: "point"
    },
    "term": {
        jp: "期間",
        en: "term"
    },
    "Purchase Schedules": {
        jp: "購入予定",
        en: "Purchase Schedules"
    },
    "Income Histories": {
        jp: "収入履歴",
        en: "Income Histories"
    },
    "Income Schedules": {
        jp: "収入予定",
        en: "Income Schedules"
    },
    "Add Purchase History": {
        jp: "購入履歴新規登録",
        en: "Add Purchase History"
    },
    "Add Purchase Schedule": {
        jp: "購入予定新規登録",
        en: "Add Purchase Schedule"
    },
    "Add Income History": {
        jp: "収入履歴新規登録",
        en: "Add Income History"
    },
    "Add Income Schedule": {
        jp: "収入予定新規登録",
        en: "Add Income Schedule"
    },
    "Edit Purchase Schedule": {
        jp: "購入予定新規編集",
        en: "Add Purchase Schedule"
    },
    "Edit Income History": {
        jp: "収入履歴新規編集",
        en: "Add Income History"
    },
    "Edit Income Schedule": {
        jp: "収入予定新規編集",
        en: "Add Income Schedule"
    },
    "Add Item": {
        jp: "項目新規登録",
        en: "Add Item"
    },
    "Edit Item": {
        jp: "項目編集",
        en: "Add Item"
    },
    "Sum_All": {
        jp: "総計",
        en: "Sum_All"
    },
    "incomeH": {
        jp: "収入実績金額",
        en: "incomeH"
    },
    "purchaseH": {
        jp: "購入実績金額",
        en: "purchaseH"
    },
    "history": {
        jp: "実績小計",
        en: "history"
    },
    "incomeS": {
        jp: "収入予定金額",
        en: "incomeS"
    },
    "purchaseS": {
        jp: "購入予定金額",
        en: "purchaseS"
    },
    "schedule": {
        jp: "予定小計",
        en: "schedule"
    },
    "toal": {
        jp: "総計",
        en: "toal"
    },
    "Income Date": {
        jp: "収入日",
        en: "income_date"
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
