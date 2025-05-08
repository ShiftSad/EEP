#include <stdio.h>

int main() {
    for (int i = 100; i >= 0; i--) {
        if (i % 2 == 0) {
            printf("%d é um número par\n", i);
        }
    }
}