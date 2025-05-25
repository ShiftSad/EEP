#include <stdio.h>

int calcular_mdc(int a, int b) {
    int temp;
    while (b != 0) {
        temp = b;
        b = a % b;
        a = temp;
    }
    return a;
}

int main() {
    int num1, num2;
    scanf("%d %d", &num1, &num2);
    int mdc = calcular_mdc(num1, num2);
    printf("%d\n", mdc);
    return 0;
}
