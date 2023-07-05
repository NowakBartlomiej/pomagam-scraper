export const formatAmount = (amount) => {
    return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + " zł"
    // return amount + "zł";
}

export const formatNumberId = (numberId) => {
    return numberId.replace('number_', '');
}
