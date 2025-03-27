#include <stdio.h>

int main() {
    float price;

    printf("Digite o preço do produto: ");
    scanf("%f", &price);

    printf("Preço com desconto: %.2f\n", price * 0.9);
}