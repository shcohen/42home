/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   libft.h                                            :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <marvin@42.fr>                     +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/05/15 16:57:58 by shcohen           #+#    #+#             */
/*   Updated: 2018/09/11 21:05:58 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#ifndef LIBFT_H
# define LIBFT_H

# include <string.h>
# include <unistd.h>
# include <stdio.h>
# include <stdlib.h>

typedef struct		s_list
{
	void			*content;
	size_t			content_size;
	struct s_list	*next;
}					t_list;

void				ft_putchar(char c);
void				ft_putstr(const char *str);
void				ft_putnbr(int nb);
void				ft_putendl(const char *str);
void				ft_bzero(void *str, size_t len);
void				*ft_memset(void *str, int c, size_t len);
void				*ft_memcpy(void *dest, const void *src, size_t len);
void				*ft_memccpy(void *dest, const void *src, int c, size_t len);
void				*ft_memmove(void *dest, const void *src, size_t len);
void				*ft_memchr(const void *s, int c, size_t len);
void				*ft_memalloc(size_t size);
void				ft_memdel(void **ap);
void				ft_putchar_fd(char c, int fd);
void				ft_putstr_fd(const char *str, int fd);
void				ft_putendl_fd(const char *str, int fd);
void				ft_putnbr_fd(int nb, int fd);
void				ft_strclr(char *str);
void				ft_striter(char *str, void (*f)(char *));
void				ft_striteri(char *str, void (*f)(unsigned int, char *));
void				ft_strdel(char **as);
int					ft_memcmp(const void *s1, const void *s2, size_t len);
int					ft_atoi(const char *str);
int					ft_strcmp(const char *s1, const char *s2);
int					ft_isalpha(int c);
int					ft_isdigit(int c);
int					ft_isalnum(int c);
int					ft_isascii(int c);
int					ft_toupper(int c);
int					ft_tolower(int c);
int					ft_isprint(int c);
int					ft_strequ(const char *s1, const char *s2);
int					ft_strnequ(const char *s1, const char *s2, size_t n);
int					ft_strncmp(const char *s1, const char *s2, size_t n);
char				*ft_strdup(const char *src);
char				*ft_strcpy(char *dest, const char *src);
char				*ft_strncpy(char *dest, const char *src, size_t n);
char				*ft_strcat(char *dest, const char *src);
char				*ft_strncat(char *dest, const char *src, size_t nb);
char				*ft_strstr(const char *str, const char *to_find);
char				*ft_strnstr(const char *str, const char *to_find, size_t l);
char				*ft_strchr(const char *str, int c);
char				*ft_strrchr(const char *str, int c);
char				*ft_strmap(const char *str, char (*f)(char));
char				*ft_strmapi(const char *str, char (*f)(unsigned int, char));
char				*ft_strsub(const char *str, unsigned int start, size_t len);
char				*ft_strtrim(const char *str);
char				*ft_strjoin(const char *s1, const char *s2);
char				*ft_strnew(size_t size);
char				*ft_itoa(int nb);
char				**ft_strsplit(const char *str, char c);
size_t				ft_strlen(const char *str);
size_t				ft_strlcat(char *dest, const char *src, size_t size);
t_list				*ft_lstnew(void const *content, size_t content_size);
void				ft_lstdelone(t_list **alst, void (*del)(void *, size_t));
void				ft_lstdel(t_list **alst, void (*del)(void *, size_t));
void				ft_lstadd(t_list **alst, t_list *new);

#endif
