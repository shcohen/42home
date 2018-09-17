/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_error.c                                         :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/09/13 17:44:14 by shcohen           #+#    #+#             */
/*   Updated: 2018/09/17 20:30:11 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "include/fillit.h"

void	ft_error(int fd, t_var *var)
{
	(void)var;
	if (fd == 1)
		puts("\nopen failed.");
	if (fd == 2)
		puts("\nread failed.");
	if (fd == 3)
		puts("\nclose failed.");
	printf("ouyi");
	if (ft_tetri1(var) == -1)
		puts("\ntetriminos invalid.");

	exit(0);
}