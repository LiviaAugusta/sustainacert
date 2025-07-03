// resources/js/utils/number.ts
export const fmt = (n: number | string) =>
  Number(n).toLocaleString('it-IT', {
    minimumFractionDigits: 0,
    maximumFractionDigits: 2,
  });