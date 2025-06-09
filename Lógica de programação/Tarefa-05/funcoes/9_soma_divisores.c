#include <stdio.h>

int somar_divisores_de_numero(int n) {
    if (n <= 0) return 0;
    int soma = 0;
    for (int i = 1; i <= n; i++) {
        if (n % i == 0) {
            soma += i;
        }
    }
    return soma;
}

int main() {
    int val;
    scanf("%d", &val);
    printf("%d\n", somar_divisores_de_numero(val));
    return 0;
}
