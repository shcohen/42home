# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Makefile                                           :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: shcohen <marvin@42.fr>                     +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2018/05/15 15:15:10 by shcohen           #+#    #+#              #
#    Updated: 2018/05/25 22:08:00 by shcohen          ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

NAME = libft.a
CC = gcc
FLAGS = -Wall -Werror -Wextra
SRC = ft_memset.c \
	  ft_bzero.c \
	  ft_memcpy.c \
	  ft_memccpy.c \
	  ft_memmove.c \
	  ft_memchr.c \
	  ft_memcmp.c \
	  ft_strlen.c \
	  ft_strdup.c \
	  ft_strcpy.c \
	  ft_strncpy.c \
	  ft_strcat.c \
	  ft_strncat.c \
	  ft_strstr.c \
	  ft_strnstr.c \
	  ft_atoi.c \
	  ft_strcmp.c \
	  ft_strncmp.c \
	  ft_putchar.c \
	  ft_putstr.c \
	  ft_strchr.c \
	  ft_strrchr.c \
	  ft_putnbr.c \
	  ft_isalpha.c \
	  ft_isdigit.c \
	  ft_isalnum.c \
	  ft_isascii.c \
	  ft_toupper.c \
	  ft_tolower.c \
	  ft_isprint.c \
	  ft_putendl.c \
	  ft_putchar_fd.c \
	  ft_putstr_fd.c \
	  ft_putendl_fd.c \
	  ft_putnbr_fd.c \
	  ft_strequ.c \
	  ft_strnequ.c \
	  ft_strclr.c \
	  ft_striter.c \
	  ft_striteri.c \
	  ft_strmap.c \
	  ft_strmapi.c \
	  ft_strnew.c \
	  ft_strdel.c \
	  ft_memalloc.c \
	  ft_memdel.c
SRCO = ${SRC:.c=.o}

all : $(NAME)

$(NAME) :
		$(CC) $(FLAGS) -c $(SRC)
		ar rc $(NAME) $(SRCO)
		ranlib $(NAME)

clean :
	rm -rf $(SRCO)

fclean : clean
	rm -rf $(NAME)

re : fclean all

.PHONY : all clean fclean re
