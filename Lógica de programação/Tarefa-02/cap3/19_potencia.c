#include <stdio.h>

int main() {
    float x, z;

    printf("Digite a base: ");
    scanf("%f", &x);
    printf("Digite a largura: ");
    scanf("%f", &z);

    float area = x * z;
    printf("Energia: %.2fW\n", area * 18);
}