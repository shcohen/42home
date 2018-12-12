/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   display.c                                          :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/12/12 19:30:32 by shcohen           #+#    #+#             */
/*   Updated: 2018/12/12 19:32:26 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fdf.h"

void    ft_display(void)
{
    ft_putstr("\n -------------------------------------------- ");
	ft_putstr("\n|                            ^               |");
	ft_putstr("\n|            You can move  <   >             |");
	ft_putstr("\n|                            v               |");
	ft_putstr("\n|       You can zoom with '/' & '*'          |");
	ft_putstr("\n|                                            |");
	ft_putstr("\n|  You can inc. & dec. depth with '+' & '-'  |");
	ft_putstr("\n|                                            |");
	ft_putstr("\n|        You can shut down with 'esc'        |");
    ft_putstr("\n --------------------------------------------\n\n");
}