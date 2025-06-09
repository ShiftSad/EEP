#include <stdio.h>

int verificar_divisibilidade_e_retornar_divisor(int num1, int num2) {
    if (num2 == 0) return -1; // Indicador de erro para divisor zero
    if (num1 % num2 == 0) {
        return 0;
    } else {
        return num2;
    }
}

int main() {
    int n1, n2;
    scanf("%d %d", &n1, &n2);
    printf("%d\n", verificar_divisibilidade_e_retornar_divisor(n1, n2));
    return 0;
}
